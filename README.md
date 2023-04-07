# Composite and Foreign Keys as Primary Key with API Platform

https://www.doctrine-project.org/projects/doctrine-orm/en/2.14/tutorials/composite-primary-keys.html#composite-and-foreign-keys-as-primary-key

## Car

- Car POST ✅
```json
{
    "name": "peugeot",
    "year": 2008
}
```
- Car GET item ❌
- Car GET collection ❌

## Article ArticleAttribute

- Article POST ❌
- Article GET item ❌
- Article GET collection ❌

 
- ArticleAttribute POST ❌
- ArticleAttribute GET item ❌
- ArticleAttribute GET collection ❌

## Address User

- Address POST ❌
- Address GET item ❌
- Address GET collection ❌

 
- User POST ❌
- User GET item ❌
- User GET collection ❌

## Order Product

- Customer POST ✅
```json
{}
```
- Customer GET item ✅
- Customer GET collection ✅


- Order POST ❌
- Order GET item ❌
- Order GET collection ❌


- OrderItem POST ❌
- OrderItem GET item ✅
- OrderItem GET collection ✅


- Product POST ✅
```json
{
  "name": "string",
  "currentPrice": 0
}
```
- Product GET item ✅
- Product GET collection ✅
