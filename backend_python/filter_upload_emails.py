import pandas as pd
import numpy as np
from sklearn.feature_extraction.text  import CountVectorizer
from scipy.sparse import csr_matrix
import nltk
import re
from nltk.tokenize import word_tokenize 
from nltk.tag import pos_tag
from connect_database import add_to_database
from nltk.corpus import stopwords
stp_words=stopwords.words('english') 
target_words_string="thapar placement internships campus"
target_words=target_words_string.split(" ")
threshhold=[0,1,1,1]
not_required_words_string="expert talk survey scholarship Ambassador 6petition festival"
not_required_words=not_required_words_string.split(" ")
companies=pd.read_csv('companies_thapar/companies_dataframe.csv')
stop_words_for_placements=pd.read_csv("companies_thapar/stop_words_for_companies.csv")


def extract_links(dataset):
     temp=list()
     for i in dataset["Email_body"]:
        
        pattern = r'https?://[^\s<>"]+'
        matches=''
        if(type(i)==str):
            matches = re.findall(pattern, i)
        matches=list(set(matches))
               
        if(type(matches) is None):
            temp.append="No Links Found"
        else: 
            temp.append(str(list(set(matches))))
            
     return pd.DataFrame({"Links":temp})
     
     

def check_stop_words_for_placements(i):
    for j in stop_words_for_placements["Stopwords"]:
        if((j.lower())==(i.lower())):
            return False
    
    return True
def check_company(str):
    for i in companies["Company_name"]:
            if(str in i.lower()):
                return (True,i)
    return (False,"not known")
def whole_word_is_in_subject(x,i):
    x=x[1].split(" ")
    x=x[0]
    
    if(x in i):
        return True
    else:
        
        return False
def get_company_names(dataset):
    company_names=[]
    
    for i in dataset["Email_Subject"]:
        
        assigned=False
        chunking=pos_tag(word_tokenize(i.replace("Re:","  name-> ").replace("Fwd:","name-> ").lower()))
        repeatonce=True
        for j in chunking:
            company_check=(check_company(j[0]))
            if(j[1]=="NN"  and company_check[0] and repeatonce and check_stop_words_for_placements(j[0]) and whole_word_is_in_subject(company_check,i)):
                company_names.append(company_check[1])
                assigned=True
                repeatonce=False
        if(assigned==False):
            company_names.append("NOT CLEAR")
    return pd.DataFrame(company_names,columns=["Company_Name"])  

def filter_and_upload_emails(all_emails):
    def data_clean1(x):
        # for i in stp_words:
        #     x=x.replace(" "+str(i)+" "," ")
        x = re.sub('\n\n', '\n', x)
        # x=x.replace(">","")
        x=re.sub('\n',"<br>",x)
        x=x.replace("-","")
        x=x.replace("*","")
        x=x.replace(","," ")
        x=x.replace("\r","")
        x=x.strip()
        return x
    def data_clean2(x):
        x=re.sub("<br>"," ",x)
        return x
    def boolean_selector(dataset,row):
        decision=True
        for i in range (len(target_words)):
            if(target_words[i] in dataset.columns):
                decision=(decision or (dataset.loc[row,target_words[i]]>=threshhold[i]))
        for i in range(len(not_required_words)):
            if(not_required_words[i] in dataset.columns):    
                decision=decision and (dataset.loc[row,not_required_words[i]]==0) 
        return decision
    
    all_emails["Preprocessed_email_body"]=(all_emails.loc[:,"Email_body"]).apply(data_clean1)
    vectorizer=CountVectorizer(ngram_range=(0,1))
    vec_data=((vectorizer.fit_transform(all_emails.loc[:,"Email_body"])))
    feature_names = pd.Series(vectorizer.get_feature_names_out())
    feature_names=feature_names.apply(lambda x: x.lower())
    vec_data=pd.DataFrame.sparse.from_spmatrix(vec_data)
    vec_data.columns=feature_names

    email_to_select=[]
    for i in range(0,vec_data.shape[0]):
        if(boolean_selector(vec_data,i)):
            email_to_select.append(i)


    desired_emails=all_emails.iloc[email_to_select,:]
    
    desired_emails["Email_Subject"]=desired_emails["Email_Subject"].apply(data_clean2)
    desired_emails=pd.concat([desired_emails,get_company_names(desired_emails)],axis=1)  
    desired_emails=pd.concat([desired_emails,extract_links(desired_emails)],axis=1)

    print(desired_emails.columns)
    print(desired_emails['Links'])       
    desired_emails.fillna("Nan",inplace=True)
    add_to_database(desired_emails)

# all_emails=pd.read_csv("backend_python/test_dataset.csv")
# filter_and_upload_emails(all_emails)
