# Here you can find the steps to compelete the task
## The steps of creating sample web application (Php,MySQL, and Adminer)

## 1. Create Docker Image for Php application 
   #### - create index.php and Dockerfile 
- You can find the files inside index directory (https://github.com/davabdallah/Robusta-Kubernetes/tree/master/index)
  #### - build the image and push it to my Docker hub repo using the below commands
  ```console
      docker build -t davabdallah/php-image:1.4 .
  '''
  ```console
      docker bush davabdallah/php-image:1.4
  '''

## 2. Start to build the web application in kubernetes
   ### 1. The below Steps to Install Mysql
   
### 1. Create Storage Class, PV and PVC for mysql
-  You can check the files [mysql-sc.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/mysql/01.%20mysql-sc.yaml), [mysql-pv.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/mysql/02.%20mysql-pv.yaml), [mysql-pvc.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/mysql/03.mysql-pvc.yaml)

### 2. Create mysql secret for mysql password
-  You can check the files [mysql-secret.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/mysql/04.%20mysql-secret.yaml)

### 3. Create mysql deployment file
-  You can check the files [mysql-secret.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/mysql/05.%20mysql-deplyment.yaml)

```console
kubectl apply -f ./mysql
```

      
    
 
   
    
