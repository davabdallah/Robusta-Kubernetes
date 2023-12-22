pipeline {
    agent any

    environment {
        GIT_REPO_URL = 'https://github.com/davabdallah/Robusta-Kubernetes.git'
        GIT_BRANCH = 'master'

        HELM_CHART_PATH = 'my-php-app'

        K8S_NAMESPACE = 'default'
        HELM_RELEASE_NAME = 'robusta-01'
    }

    stages {
        stage('Checkout') {
            steps {
                // Checkout the source code from the repository
                checkout([$class: 'GitSCM', branches: [[name: GIT_BRANCH]], userRemoteConfigs: [[url: GIT_REPO_URL]]])
            }
        }

        stage('Deploy Helm Chart') {
            steps {
                script {
                    // Fetch Helm chart from Git repository
                    sh "git clone -b ${GIT_BRANCH} ${GIT_REPO_URL} temp-git-repo"
                    sh "cp -r temp-git-repo/${HELM_CHART_PATH} ."
                    // Install or upgrade Helm chart
                    sh "helm upgrade --install ${HELM_RELEASE_NAME} ./${HELM_CHART_PATH} --namespace ${K8S_NAMESPACE}"
                }
            }
        }
    }
}
