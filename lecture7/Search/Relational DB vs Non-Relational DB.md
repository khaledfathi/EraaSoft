# Relational DB vs None Relational DB 

# Relational (SQL)
* Structure 
 1.Tables
 2.Constraints 
 2.Relations 
* Storage 
1.Concentrated
* Scale 
1,Vertical (better machine)
2.horizontal (mote machines)
* Access 
1.Raw SQL - like (SELECT * FROM ...)
2.Object Relational Mappers 
--- 
# None Relational (NoSQL)
#### Anything that is non-relational 
#### has many implementations .. Table , Document , Graph
#### built to scale with high performance , but queries are less flexible  
* Structure 
1.Table 
2.Document (JSON)
2.Graph
3.Depend on (key , value) Store
* Storage 
1.Hashing Input 
* Scale 
1.Add more partitions  
* Access 
1.REST APIs 
2.CRUD in Vendor Specific language 

---
### When to use what ?
#### SQL
* when your access patterns aren't define 
* when you want to perform flexible queries 
* when you want to perform relational queries 
* when you want enforce field constraints 
* when you want to use a well documented access language (sql)
#### NoSQL 
* when your access pattern is defined 
* when your primary key is known 
* when your data model fits (graphs)
* when you need high performance and low latency 
---
### How to pick (Example Scenarios )?
* small project + low scale + unknown access patterns -> **SQL**
* Large project + high scale + relational queries -> **SQL**
* medium/large project + high scale +high performance -> **NoSQL**
