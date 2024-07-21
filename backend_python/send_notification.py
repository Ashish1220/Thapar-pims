from datetime import datetime
import pywhatkit as pwk

def send_notification(payload,contact):
    current_date_time = datetime.now()
    current_time = current_date_time.strftime("%H:%M")
    print(current_time)
    pwk.sendwhatmsg_instantly(phone_no="+91"+contact,message=payload,tab_close=True)
    # keyboard.press("enter")
# pwk.sendwhatmsg_to_group_instantly("", "hey")

# if __name__=="__main__":
#     send_notification("bwfjhbefkeaurfyhuerxlkgvyurebfluefuiexhzruifghiuzrgfugeriuhglihufluih4rzfuihrluifhgluheruifdhhjjbkjdjnvjkdkvkjdfjbuifdvuidnuividfunvkjdrngdfjkvhjkdfhfkvhndfkjvjkdfhawopkkjvfdnvrebngwepojvisdncvudfbnvuidfbhguirdfngoerinfiwejfopjlxjdnvnjkdfnvkjhrrjgiojdriugesduysefhhsdkjfhiodjbipsjfeoerfjkwelkknsekjfnjkabdisvliodojpwjgiefflcnlisdvjdfkbkdfunksfdvvhsfid","9872141607")