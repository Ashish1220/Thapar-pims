import os
import pymysql
import pandas as pd
from send_notification import send_notification
import re
import time
from NLP_TRAINED_MODEL.bart import PowerupSummarizer


connection = pymysql.connect(host="localhost", port=3306, user="root", passwd="", database="thapar_pims")
cursor = connection.cursor()
sql = "INSERT INTO `getemails_new` (`Sender_Email`,`Email_recv_date`,`Email_Subject`,`Email_body`,`Important_links`,`Company_Name`) VALUES (%s,%s,%s,%s,%s,%s)"

def commit_to_db(x):

    sender_email = str(x.iloc[0]).encode('utf-8')
    recv_date = str(x.iloc[1]).encode('utf-8')
    subject = str(x.iloc[2]).encode('utf-8')
    body = str(x.iloc[4]).encode('utf-8')
    links = str(x.iloc[6]).encode('utf-8')
    company_name = str(x.iloc[5]).encode('utf-8')

    
    cursor.execute(sql, (sender_email, recv_date, subject, body, links, company_name))      
    
def add_to_database(dataset):
    no_of_new_emails = dataset.shape[0]
    payload_message = "THAPAR_PIMMS:\n"
    summarizer_model=PowerupSummarizer()    
    temp=""
    
    to_summarise_list=[]
    for i in range((no_of_new_emails)):
        for j in dataset.iloc[i,4]:
            if(ord(j)<=127 and ord(j)>=32):
                temp+=j
        temp=str(temp)
        temp='"""'+temp+'"""'
        print(f"Creating summary for:  {temp}")
        s=summarizer_model.get_summary(temp)
        re.sub("<br>"," ",s)
        print(s)
        to_summarise_list.append(s)
        print("Summary generated!")
        temp=""
        print("nlp predecting")
    print("nlp done!! ")
    temp=0
    for i in range((no_of_new_emails)):
        dte=dataset.iloc[i,1][0:10]
        tme=dataset.iloc[i,1][11:19]
        payload_message += f"{temp + 1}. {dataset.iloc[i, 2]}\n Date: {dte}\n Time: {tme}\n Summary : {to_summarise_list[i]} \n\n ---------------\n\n"
        temp=temp+1
    
    print("IN COMMIT")
    dataset.apply(commit_to_db, axis=1)
    
    
    connection.commit()
    connection.close()
    

    
    
    payload_message=re.sub(r'\s*\d+(\.\d+)?\.\s*Nan\s*',"",payload_message)
    # print(payload_message)

    users=pd.read_csv("C:\\xampp\\\htdocs\\thapar-pims\\thapar-pims\\users.csv")
    for index, row in users.iterrows():
        print("Sending notification to ")
        print(row['Name'])
        send_notification(payload_message, str(row['Number']))
        print("Sleeping for 5 (for tutorial)")
        time.sleep(5)
    
    print("Notifications sent.")

    if os.path.exists("email_dataset\\emails.csv"):
        os.remove("email_dataset\\emails.csv")

