# importing required modules
import os
from dotenv import load_dotenv
import requests
import csv

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
    "username": user_keycloak,
    "password": password,
    "client_id": client_id,
    "grant_type": "password"
}

# requesting an access token
response = requests.post(token_url, data=payload)
access_token = response.json()["access_token"]

# read and import users from csv file
with open('./test-data/SSO-Users2.csv', 'r') as csvfile:
    reader = csv.DictReader(csvfile)
    # looping through rows and creating users
    for row in reader:
        user_url = f"{keycloak_url}/admin/realms/{realm}/users"
        # preparing headers and user data
        headers = {
            "Authorization": f"Bearer {access_token}",
            "Content-Type": "application/json"
        }
        user_data = {
            "username": row['username'],
            "enabled": row['enabled'],
            "firstName": row['firstName'],
            "lastName": row['lastName'],
            "email": row['email']
        }
        # sending post request to create user
        response = requests.post(user_url, json=user_data, headers=headers)
        # processing response
        if response.status_code == 201:
            print(f"User {row['username']} created successfully")
            
            # Extract user ID from the Location header
            location_header = response.headers.get('Location')
            if location_header:
                user_id = location_header.split('/')[-1]  # Extract the user ID from the URL
                password_url = f"{user_url}/{user_id}/reset-password"
                password_payload = {
                    "type": "password",
                    "value": row['password']
                }
                password_response = requests.put(password_url, json=password_payload, headers=headers)
                if password_response.status_code == 204:
                    print(f"Password set for user {row['username']}")
                else:
                    print(f"Error setting password for user {row['username']}: {password_response.status_code}")
            else:
                print(f"Error extracting user ID from response header")
        else:
            print(f"Error creating user {row['username']}: {response.status_code}")