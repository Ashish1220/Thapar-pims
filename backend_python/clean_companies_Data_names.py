import pandas as pd


with open("companies_thapar/newcompanies.txt","r") as f:
    d=f.read()

for ele in d:
    if ele.isdigit():
        d = d.replace(ele, "")
d=d.replace("\n\n\n\n","\n")
d=d.replace("Company_name","")
d=d.split("\n")





pd.DataFrame({"Company_name":d}).to_csv("companies_thapar/newcompanies.csv",index=False)