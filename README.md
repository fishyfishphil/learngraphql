# learngraphql

> A very basic implementation of `rebing/graphql-laravel`

Update `.env` file

---

```bash
composer install
```

---

```bash 
npm install
```

---

```bash
php artisan migrate --seed
```

---

Go to `http://localhost/graphql-ui`

---

## Query
```graphql
{
  users {
    id
    name
    email
  }
}

```
```graphql
{
  users(id: "3") {
    id
    name
    email
  }
}
```

## Mutation
```graphql
mutation {
  updateUser(id: "3", name: "NewName", email: "newmail@mail.com") {
    name
    email
  }
}
```
```graphql
mutation {
  updateUserPassword(id: "3", password: "secret") {
    name
    email
  }
}
```