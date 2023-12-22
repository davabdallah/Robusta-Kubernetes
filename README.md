# Here you can find the steps to compelete the task
## The steps of creating sample web application (Php,MySQL, and Adminer)

## Create Docker Image for Php application 
   #### - Create index.php and Dockerfile 
- You can find the files inside [index](https://github.com/davabdallah/Robusta-Kubernetes/tree/master/index)
  
- Build the image and push it to my Docker hub repo using the below commands
  
  ```console
      docker build -t davabdallah/php-image:1.4 .
  ```
  
  ```console
      docker bush davabdallah/php-image:1.4
  ```

## Build the web application in kubernetes
   ### 1. Create Mysql
   
#### - Create Storage Class, PV and PVC for mysql
-  You can check the files [mysql-sc.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/mysql/01.%20mysql-sc.yaml), [mysql-pv.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/mysql/02.%20mysql-pv.yaml), [mysql-pvc.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/mysql/03.mysql-pvc.yaml)

#### - Create mysql secret for mysql password
-  You can check the files [mysql-secret.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/mysql/04.%20mysql-secret.yaml)

#### - Create mysql deployment file
-  You can check the files [mysql-secret.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/mysql/05.%20mysql-deplyment.yaml)

#### - Create mysql service
-  You can check the files [mysql-service.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/mysql/06.%20mysql-service.yaml)

#### - Run the below command to create mysql

```console
kubectl apply -f ./mysql
```

### 2. Create Php
#### - Create php deployment file
-  You can check the files [php-deployment.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/php/01.%20php-deployment.yaml)

#### - Create php service
-  You can check the files [php-service.yaml](https://github.com/davabdallah/Robusta-Kubernetes/tree/master/php)

### - Create php ingress
-  You can check the files [php-ingress.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/php/02.%20php-ingress.yaml)

#### - Run the below command to create php

```console
kubectl apply -f ./php
```

### 3. Create Phpadmin
#### - Create phpadmin deployment file
-  You can check the files [phpadmin-deployment.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/phpadmin/01.%20phpadmin-deployment.yaml)

#### - Create phpadmin service
-  You can check the files [phpadmin-service.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/phpadmin/03.%20phpadmin-service.yaml)

#### - Create phpadmin ingress
-  You can check the files [phpadmin-ingress.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/phpadmin/02.%20phpadmin-ingress.yaml)

```console
kubectl apply -f ./phpadmin
```

### some tips here
- Make sure that you can access php and phpadminer by added the Kubernetes public IP in your local hosts file
- Make sure that you have added the sql service name in both php, phpadmin deployments and index.php as well.


## Combine All Files into a Helm Chart

### Create Helm Chart Structure

```console
mkdir my-php-app-chart
```

```console
cd my-php-app-chart
```

```console
helm create my-php-app
```

### Organize Helm Chart Files
- You can check [my-php-app](https://github.com/davabdallah/Robusta-Kubernetes/tree/master/my-php-app)

### Package the Helm Chart

```console
helm package my-php-app-chart/my-php-app
```

### Install the Helm chart on the Kubernetes cluster

```console
helm install my-php-app my-php-app-chart/my-php-app-0.1.0.tgz
```
 

    
