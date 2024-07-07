from datetime import datetime
import pywhatkit as pwk
import keyboard

def send_notification(payload,contact):
    current_date_time = datetime.now()
    current_time = current_date_time.strftime("%H:%M")
    print(current_time)
    pwk.sendwhatmsg(phone_no="+91"+contact,message=payload,time_hour=int(current_time[0:2]),time_min=int(current_time[3:5])+1,wait_time=8,tab_close=True,close_time=6)
    keyboard.press("enter")
# pwk.sendwhatmsg_to_group_instantly("", "hey")

if __name__=="__main__":
    send_notification("bwfjhbefkeaurfyhuerxlkgvyurebfluefuiexhzruifghiuzrgfugeriuhglihufluih4rzfuihrluifhgluheruifdhhjjbkjdjnvjkdkvkjdfjbuifdvuidnuividfunvkjdrngdfjkvhjkdfhfkvhndfkjvjkdfhawopkkjvfdnvrebngwepojvisdncvudfbnvuidfbhguirdfngoerinfiwejfopjlxjdnvnjkdfnvkjhrrjgiojdriugesduysefhhsdkjfhiodjbipsjfeoerfjkwelkknsekjfnjkabdisvliodojpwjgiefflcnlisdvjdfkbkdfunksfdvvhsfid","9872141607")