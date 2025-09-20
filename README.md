API Endpoints

POST /api/register → Create new user

POST /api/login → Login and get JWT token

GET /api/me → Get current user (needs Authorization: Bearer <token>)

POST /api/logout → Logout (invalidate token)

POST /api/refresh → Refresh token


GET    api/users          -> index

POST   api/users          -> store

GET    api/users/{user}   -> show

PUT    api/users/{user}   -> update

PATCH  api/users/{user}   -> update

DELETE api/users/{user}   -> destroy