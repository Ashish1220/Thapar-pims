import os
import pymysql
import pandas as pd
from send_notification import send_notification
import re
import time

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
    temp = 0
    payload_message = "THAPAR_PIMMS:\n"
    
    for i in range(no_of_new_emails):
        payload_message += f"{temp + 1}. {dataset.iloc[i, 2]}\n"
        temp=temp+1
    
    print("IN COMMIT")
    print("payload message:")
    # print(payload_message.encode('utf-8'))
    
    dataset.apply(commit_to_db, axis=1)
    
    
    connection.commit()
   
    connection.close()
    
    print("Notifications sent.")
    payload_message=re.sub(r'\s*\d+(\.\d+)?\.\s*Nan\s*',"",payload_message)
    # print(payload_message)

    users=pd.read_csv("C:\\xampp\\\htdocs\\thapar-pims\\thapar-pims\\users.csv")
    for index, row in users.iterrows():
        print("Sending notification to ")
        print(row['Name'])
        send_notification(payload_message, str(row['Number']))
        print("Sleeping for 60")
        time.sleep(60)
    
    if os.path.exists("email_dataset\\emails.csv"):
        os.remove("email_dataset\\emails.csv")

