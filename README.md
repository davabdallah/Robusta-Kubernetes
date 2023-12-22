# The steps to complete the task

## The steps of creating sample web application (PHP,MySQL,PHPAdminer)
### Locally First
- First step was trying to deploy the application on my local machine
- I have used Docker desktop and VSC.

##### - The steps on my local Machine

- Create a directory for your PHP application
- Create [DockerFile](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/local_machine/php-app/Dockerfile) for PHP
- Create index.php file in the same directory with Dockerfile.
- Create [DockerCompose](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/local_machine/Docker-Compose.yaml) file to deploy all components.
- Build and run the Docker containers using the following command
  
```console
docker-compose up --build -d
```
- try to access PHPMyAdmin http://localhost:8001 and create a table

![image](https://github.com/davabdallah/Robusta-Kubernetes/assets/71341750/446f6ca7-63e4-43db-910c-c637bf9c020b)

- Update [index.php](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/local_machine/php-app/index.php) file with that update
- Rebuild the Docker containers again and try to access php http://localhost 

![image](https://github.com/davabdallah/Robusta-Kubernetes/assets/71341750/d9ab3511-77c2-43a8-94b6-81d24b2da670)


###

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

## Deploy the web application in Kubernetes
   ### 1. Create MYSQL
   
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

### 2. Create PHP
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

### 3. Create Adminer
#### - Create phpadmin deployment file
-  You can check the files [phpadmin-deployment.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/phpadmin/01.%20phpadmin-deployment.yaml)

#### - Create phpadmin service
-  You can check the files [phpadmin-service.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/phpadmin/03.%20phpadmin-service.yaml)

#### - Create phpadmin ingress
-  You can check the files [phpadmin-ingress.yaml](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/phpadmin/02.%20phpadmin-ingress.yaml)

```console
kubectl apply -f ./phpadmin
```

#### - Access the Adminer using ingress and create a table
![image](https://github.com/davabdallah/Robusta-Kubernetes/assets/71341750/69287cbe-827c-4a6f-85e6-d1baa7aba622)

### - Access PHP using ingress

![image](https://github.com/davabdallah/Robusta-Kubernetes/assets/71341750/c557e26f-79cf-48ec-bdfa-5f3dc7b6cfb6)

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

 ## Create Jenkins pipeline for CI/CD

 - Open Jenkins in your web browser
 - Create a new Jenkins pipeline job
 - Configure your pipeline:
 - Select "Pipeline script from SCM" in the "Pipeline" section.
 - Choose your SCM and Enter the repository URL https://github.com/davabdallah/Robusta-Kubernetes.git
 - Specify the branch or tag to build (master)
 - use a [Jenkinsfile](https://github.com/davabdallah/Robusta-Kubernetes/blob/master/Jenkinsfile) in my Git repository.
 - Build the pipeline

![image](https://github.com/davabdallah/Robusta-Kubernetes/assets/71341750/3a4315e1-08d2-4cfa-8821-947419fef9ca)


    
