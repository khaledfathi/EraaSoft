# Relational DB vs None Relational DB 

# Relational (SQL)


1. **Structure** 
   * Tables
   * Constraints 
   * Relations 
2. **Storage** 
   * Concentrated
3. **Scale** 
   * Vertical (better machine)
   * horizontal (mote machines)
4. **Access** 
   * Raw SQL - like (SELECT * FROM ...)
   * Object Relational Mappers 
--- 
# None Relational (NoSQL)
#### Anything that is non-relational 
#### has many implementations .. Table , Document , Graph
#### built to scale with high performance , but queries are less flexible  
1. **Structure** 
   * Table 
   * Document (JSON)
   * Graph
   * Depend on (key , value) Store
2. **Storage** 
   * Hashing Input 
3. **Scale** 
   * Add more partitions  
4. **Access** 
   * REST APIs 
   * CRUD in Vendor Specific language 

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
---
