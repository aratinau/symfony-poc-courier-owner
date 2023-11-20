# Symfony POC Courier Owner

`php bin/console doctrine:fixtures:load`


```mermaid
flowchart TD
    A[Courier] -->|OneToOne| B(CourierOwner)
    B -->|ManyToOne| D[Service]
    B -->|ManyToOne| E[User]
```
