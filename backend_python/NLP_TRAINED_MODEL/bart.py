from transformers import pipeline,BartForConditionalGeneration, BartTokenizer
import torch

def divide_into_batches(text, batch_size=3622):
    batches = [text[i:i + batch_size] for i in range(0, len(text), batch_size)]
    print(f"Total length of text: {len(text)}")
    print(f"Number of batches created: {len(batches)}")
    for i, batch in enumerate(batches):
        print(f"Batch {i+1} length: {len(batch)}")
    return batches

class PowerupSummarizer:
    def __init__(self) -> None:
        print("starting summarizer")
        self.summarizer = pipeline("summarization", model="facebook/bart-large-cnn")
        print("Summarizer powered up!")

  

    def get_summary(self, to_summarise):
        batches=divide_into_batches(to_summarise,3200)
        print(len(batches))
        summary=[]
        for i in batches:
            temp_summ=self.summarizer(i)[0]['summary_text']
            print(temp_summ)
            print("\n -------------------\n")
            summary.append(temp_summ)
        
        return ' '.join(summary)


if __name__ == "__main__":
    model = PowerupSummarizer()
    text="""TCS Confidential<br><br>Dear Professors <br><br>We are delighted to announce that TCS  is back with a fresh season<br>of HackQuest  our flagship cybersecurity challenge! We are inviting young<br>techies out there to showcase their ethical hacking skills at the eighth<br>edition of TCS HackQuest and join our army of cybersecurity specialists<br>working towards building a greater  safer future.<br>FW: TCS HackQuest | Season 8 | YOP 2024 | Participate Now !<br>Registration Link: https://hackquest.tcsapps.com/<br><br><br><br>Registration End Date:  23rd January 2024<br><br>TCS HackQuest is exclusively open for students graduating in the year 2024<br>with the following academic degrees: Bachelor of Technology (B.Tech.) /<br>Bachelor of Engineering (B.E.) / Master of Technology (M.Tech.) / Master of<br>Engineering (M.E.) / Bachelor of Computer Applications (B.C.A.) / Master of<br>Computer Applications (M.C.A.) / Bachelor of Science (B.Sc. / B.S.) /<br>Master of Science (M.Sc. / M.S.) in any specialization offered by your<br>recognized universities / colleges.<br><br><br><br>You will hear more from us about HackQuest  and hopefully we will go on<br>to hear about it from you!<br><br><br><br><br>For any clarifications  please connect undersigned.<br><br><br><br>Thank you<br><br><br><br>Best Regards <br><br><br>Talent Acquisition Group  Delhi | North<br><br>Tata Consultancy Services Limited <br><br><br>https://www.tcs.com/careers?country=IN&lang=EN<br><br>"TCS does not charge any fee at any stage of the recruitment & selection<br>process.<br>TCS has not authorized any person/agency/partner to collect any fee for<br>recruitment from candidates If at all you notice the above  please bring it<br>to our attention immediately.<br><br>><br>Subject: TCS HackQuest | Season 8 | YOP 2024 | Participate Now !<br>Importance: High<br><br><br><br>Dear Professors <br><br>We are delighted to announce that TCS  is back with a fresh season<br>of HackQuest  our flagship cybersecurity challenge! We are inviting young<br>techies out there to showcase their ethical hacking skills at the eighth<br>edition of TCS HackQuest and join our army of cybersecurity specialists<br>working towards building a greater  safer future.<br><br>Registration Link: https://hackquest.tcsapps.com/<br><br><br><br>Registration End Date:  23rd January 2024<br><br>TCS HackQuest is exclusively open for students graduating in the year 2024<br>with the following academic degrees: Bachelor of Technology (B.Tech.) /<br>Bachelor of Engineering (B.E.) / Master of Technology (M.Tech.) / Master of<br>Engineering (M.E.) / Bachelor of Computer Applications (B.C.A.) / Master of<br>Computer Applications (M.C.A.) / Bachelor of Science (B.Sc. / B.S.) /<br>Master of Science (M.Sc. / M.S.) in any specialization offered by your<br>recognized universities / colleges.<br><br><br><br>You will hear more from us about HackQuest  and hopefully we will go on<br>to hear about it from you!<br><br><br><br><br>For any clarifications  please connect undersigned.<br><br><br><br>Thank you<br><br><br><br>Best Regards <br><br><br>Talent Acquisition Group  Delhi | North<br><br>Tata Consultancy Services Limited <br><br><br>https://www.tcs.com/careers?country=IN&lang=EN<br><br>"TCS does not charge any fee at any stage of the recruitment & selection<br>process.<br>TCS has not authorized any person/agency/partner to collect any fee for<br>recruitment from candidates If at all you notice the above  please bring it<br>to our attention immediately.<br><br>===============<br>Notice: The information contained in this email<br>message and/or attachments to it may contain<br>confidential or privileged information. If you are<br>not the intended recipient  any dissemination  use <br>review  distribution  printing or copying of the<br>information contained in this email message<br>and/or attachments to it are strictly prohibited. If<br>you have received this communication in error <br>please notify us by reply email or telephone and<br>immediately and permanently delete the message<br>and any attachments. Thank you<br>"""
    
    summary = model.get_summary(text)
    print(summary)


