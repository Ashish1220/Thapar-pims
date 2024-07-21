import pandas as pd

df=pd.DataFrame([1,2,3,4],[1,2,3,4])

print(df.iloc[0][0])

for i in range(df.shape[0]):
    print(str(i)+"\n")