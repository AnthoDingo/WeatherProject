import os
import requests
import time

url = 'http://127.0.0.1/api/post.php'

def upload(path):
    file = open(path, "r")
    json = file.readlines()
    req = requests.post(url, params={"json": json})
    print('[POST] ' + str(req.status_code) + ' : ' + path)
    if req.status_code == 200:
        os.remove(path)



for root, dirs, files in os.walk(r'./json'):
    for filename in files:
        upload('./json/'+filename)

time.sleep(3600)