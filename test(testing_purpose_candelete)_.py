import pandas as pd
import sys
if __name__=="__main__":
    print(sys.argv[0])
    print(sys.argv[1])
    df=pd.read_csv("C:/xampp/htdocs/thapar-pims/thapar-pims/users.csv")
    df=df[df['Number']!=sys.argv[0]]
    df.to_csv("users.csv")

    