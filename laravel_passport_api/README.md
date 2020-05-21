Sample curl :

- curl --location --request POST 'http://127.0.0.1:8000/api/register' \
--header 'Content-Type: application/json' \
--data-raw '{
	"name": "Tri Budiyono",
	"email": "tribudiyono93@gmail.com",
	"password": "test_123",
	"confirm_password": "test_123"
}'

curl --location --request POST 'http://127.0.0.1:8000/api/login' \
--header 'Content-Type: application/json' \
--header 'Cookie: XSRF-TOKEN=eyJpdiI6IkNicjlGOCtVZnl3bWxWTzlCb2FOL3c9PSIsInZhbHVlIjoiWTVpWTNkRytOUUpMeXdXOEtQNFBMN25LdGZUZWVyUmdjWkNBSDdjOFBQK25zY0xHbkUwVmsxRWNrSWlHM011ayIsIm1hYyI6ImJiNGM1ZGU0MDgyMzJkNDhmM2I2ZTUxMTMwMzNiNzRkZGVmOGIzMDMwYmZiZmZiOWU0ZjI2ZDNmOWI0MDljNWYifQ%3D%3D; laravel_session=eyJpdiI6InFscVAyU2hDVkdoVDJCajdQK0hia0E9PSIsInZhbHVlIjoiNUVwOEYyWkVvaVZneFVGaDBuQkwybE1hRlZMYjVsa2xGYmlsc1Z5WElGVDRuQnd0dXVPUlF2cTJsTTZEdWRpKyIsIm1hYyI6ImIyNjQyOTg0ZGM0MTIyNDc5ODU1ZjUzOWY0ZDdhYzUxYjQwMmRlYzlmNjc5Y2YxMmUzODYwMzdjMDUzOWZjNTcifQ%3D%3D' \
--data-raw '{
	"email": "tribudiyono93@gmail.com",
	"password": "test_123"
}'

Sample Response :
200 OK
{
    status:
}

400 Bad Request
{
    "error": {
        "code": 400,
        "message": "Bad Request",
        "errors": {
            "name": [
                "The name must be a string.",
                "The name must be at least 10 characters."
            ],
            "password": [
                "The password field is required."
            ],
            "confirm_password": [
                "The confirm password field is required."
            ]
        }
    }
}

200 OK (Single Data) => GET
{
    "data": {
        "id": 1,
        "name": "Tri"
    }
}

200 OK (Multiple Data) => GET
{
    "data" : [
        "items": [
            {
                "id": 1,
                "name": "Tri"
            },
            {
                "id": 2,
                "name": "Blah"
            }
        ]
    ]
}

201 Created => POST
{
    "data": {
        "id": 1,
        "name": "Tri"
    }
}

204 NO Content => PUT or DELETE

401 Unauthorized

403 Forbidden

