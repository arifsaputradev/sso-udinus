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

# API request to get all users
user_url = f"{keycloak_url}/admin/realms/{realm}/users"
headers = {"Authorization": f"Bearer {access_token}"}
response = requests.get(user_url, headers=headers)

# processing user data
if response.status_code == 200:
    users = response.json()
    for user in users:
        print("User ID: ", user['id'])
        print("Username: ", user['username'])
        print("First Name: ", user['firstName'])
        print("Last Name: ", user['lastName'])
        print("Email: ", user['email'])
        print(" ")
else:
    print("Error: ", response.status_code)
