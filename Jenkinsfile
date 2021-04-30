
def projectName = "appointment"

//get docker username from jenkins credentials for docker push
dockerUser = null
passVar = null
withCredentials([usernamePassword(credentialsId: 'DOCKER_ID', passwordVariable: '', usernameVariable: 'username')]) {
    dockerUser = username
}

pipeline {



        agent any 
        environment {
            dockerImage = ''
            // registry = 'jpk912/appointment'
            // github = 'https://github.com/jkosano/appointment-pipeline-app'
            // registry = '${userVar}/appointment'
            // echo "Using docker user2: ${userVar}/appointment"

        }

        stages {

            // declarative pipelines have checkout by default

            stage ('Build and Push Apache Container')  {
                steps {
                    echo "You are in workspace: $WORKSPACE"
                    script {
                        docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {  
                            sh "echo Your docker username is: ${dockerUser}"

                            website = docker.build("$dockerUser" + "/" + "$projectName-apache", "-f apache/Dockerfile .")   

                            //website.push("${env.BUILD_NUMBER}")            
                            website.push("latest")        
                        }    
                    }
                }

                post {
                    success {
                        echo "Apache image built successfully!"
                    }
                    failure {
                        echo "Apache image failed to build"
                    }
                }
            }

            stage ('Build and Push SQL Container')  {
                steps {
                    echo "You are in workspace: $WORKSPACE"
                    script {
                        docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {  
                            sh "echo Your docker username is: ${dockerUser}"

                            sqlimage = docker.build("$dockerUser" + "/" + "$projectName-sql", "-f sql/Dockerfile .")   

                            //website.push("${env.BUILD_NUMBER}")            
                            sqlimage.push("latest")        
                        }    
                    }
                }

                post {
                    success {
                        echo "SQL image built successfully!"
                    }
                    failure {
                        echo "SQL image failed to build"
                    }
                }
            }
            
            // stage('Build apache image') {    
            //     steps {
            //         sh '''
            //             docker build . -t jpk912/appointment-apache -f apache/Dockerfile
            //          '''
            //     }

            //     post {
            //         success {
            //             echo "Apache image built successfully!"
            //         }
            //         failure {
            //             echo "Apache image failed to build"
            //         }
            //     }
            // }   

            // stage('Build sql image') { 
            //     steps {   
            //         sh '''
            //             docker build . -t jpk912/appointment-sql -f sql/Dockerfile
            //         '''
            //     }
            //     post {
            //         success {
            //             echo "Sql image built successfully!"
            //         }
            //         failure {
            //             echo "Sql image failed to build"
            //         }
            //     }

            // }   

            // stage('Test image') {   
            //     steps {        
            //         sh '''
            //             echo "Tests would go here...."
            //             docker-compose up -d
            //             //ping container script goes here
            //         '''
            //     }  
            //     post {
            //         success {
            //             echo "App successfully started"
            //         }
            //         failure {
            //             echo "App failed to start"
            //         }
            //     }
            // }     
            
            // stage('Push apache image to DockerHub') {
            //     steps {
            //         sh ''' #!/bin/bash
            //             docker push jpk912/appointment-apache:${env.BUILD_NUMBER}
            //         '''

            //         // script{
            //         //     docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {            
            //         //         website.push("${env.BUILD_NUMBER}")            
            //         //         website.push("latest")      
            //         // }
            //     }
            //     post {
            //         success {
            //             echo "Apache pushed to DockerHub"
            //         }
            //         failure {
            //             echo "Apache failed to push to Dockerhub"
            //         }
            //     }
            // }

            // stage('Push sql image to DockerHub') {
            //     steps {
            //         sh ''' #!/bin/bash
            //             docker push jpk912/appointment-sql:${env.BUILD_NUMBER}
            //         '''
            //         // node {
            //         //     docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {            
            //         //         sqlimage.push("${env.BUILD_NUMBER}")            
            //         //         sqlimage.push("latest")        
            //         //     }   
            //         // }
            //     }
            //     post {
            //         success {
            //             echo "Sql pushed to DockerHub"
            //         }
            //         failure {
            //             echo "Sql failed to push to Dockerhub"
            //         }
            //     }
 
            // }
    //     stage("Stop App") {
    //         sh ''' #! /bin/bash
    //             echo "Stopping application.."
    //             cd /
    //             docker-compose down
    //         '''
    //     }
        }


    

    
}