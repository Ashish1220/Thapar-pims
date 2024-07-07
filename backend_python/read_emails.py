from simplegmail import Gmail
from simplegmail.query import construct_query
import pandas as pd
from filter_upload_emails import filter_and_upload_emails
gmail = Gmail()

query_params = {
    "newer_than": (1, "month"),
    "sender": ["csed.summerinternships@thapar.edu","spr@thapar.edu"],
}
messages = gmail.get_messages(query=construct_query(query_params))

email_data=pd.DataFrame({},columns=["Email_Sender","Email_recv_date","Email_Subject","Email_body"])
print(email_data)
i=0

for message in messages:
    i=i+1
    message
    email_data=pd.concat([email_data,pd.DataFrame({"Email_Sender":message.sender,"Email_recv_date":message.date,"Email_Subject":message.subject,"Email_body":message.plain},index=[i])])

print("DATA LOADED")

print(email_data)
filter_and_upload_emails(email_data)
print("Everything Executed Properly!.")


