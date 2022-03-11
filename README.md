# Lumen Todo Note API

APIs are accessible from lins below, and it's already connected to DB:
https://lumen-todo-api.herokuapp.com/

# Authentication
post: /register
email,password,password_confirmation
post: /login
email,passowrd


# Todo Note Routes

get: /api/todonotes/index

post: /api/todonotes/add-todo
Params: content

get: /api/todonotes/edit-todo/{id}

put: /api/todonotes/update-todo/{id}
Params: content

put: /api/todonotes/change-completion-status/{id}
toggle completion status by adding current time or making it null.

delete: /api/todonotes/remove-todo/{id}


