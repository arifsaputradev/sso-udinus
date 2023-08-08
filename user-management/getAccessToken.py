# importing required modules
import os
from dotenv import load_dotenv
import requests

# loading environment variables
load_dotenv()

# keycloak configuration
keycloak_url = os.getenv('KEYCLOAK_URL')
realm = os.getenv('REALM')
client_id = os.getenv('CLIENT_ID')
user_keycloak = os.getenv('USER_KEYCLOAK')
password = os.getenv('PASSWORD')

# creating token payload
token_url = f"{keycloak_url}/realms/master/protocol/openid-connect/token"
payload = {
    "username":user_keycloak,
    "password":password,
    "client_id":client_id,
    "grant_type":"password"
}

# requesting an access token
response = requests.post(token_url, data=payload)
access_token = response.json()["access_token"]

# print access token
print(access_token)