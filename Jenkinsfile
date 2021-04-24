
pipeline {


        // stage('get user') {
        //     userVar = null
        //     passVar = null
        //     withCredentials([usernamePassword(credentialsId: 'DOCKER_ID', passwordVariable: '', usernameVariable: 'username')]) {
        //         userVar = username
        //     }
        //     registry = '${userVar}/appointment'
        //     echo "Using docker user: ${userVar}/appointment"

        // }    
        agent any 
        environment {
            dockerImage = ''
            registry = 'jpk912/appointment'
            github = 'https://github.com/jkosano/appointment-pipeline-app'
            // registry = '${userVar}/appointment'
            // echo "Using docker user2: ${userVar}/appointment"

        }

        stages {

            // declarative pipelines have clone by default

            // stage('Clone repository') {
            //     steps {
            //         sh ''' !# /bin/bash
            //         rm -rf /var/jenkins_home/workspace/mypipeline/*
            //         git clone https://github.com/jkosano/appointment-pipeline-app
            //         '''
            //     }

            // }    
            
            stage('Build apache image') {    
                steps {
                    sh '''
                        docker build . -t jpk912/appointment-apache -f apache/Dockerfile
                     '''
                }
            }   

            stage('Build sql image') { 
                steps {   
                    sh '''
                        docker build . -t jpk912/appointment-sql -f sql/Dockerfile
                    '''
                }
            }   

            stage('Test image') {   
                steps {        
                    sh '''
                        echo "Tests would go here...."
                    '''
                }  
            }     
            
            stage('Push apache image to DockerHub') {
                steps {
                    sh ''' #!/bin/bash
                        docker push jpk912/appointment-apache:1
                    '''
                }
            }

            stage('Push sql image to DockerHub') {
                steps {
                    sh ''' #!/bin/bash
                        echo "test"
                        docker push jpk912/appointment-sql:${env.BUILD_NUMBER}
                    '''
                }
                // //push to docker-hub
                // docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {            
                //     sqlimage.push("${env.BUILD_NUMBER}")            
                //     sqlimage.push("latest")        
                // }    
            }
        }



        //testing to see if i can get dynamic variable for push repo
        // stage('Push apache image to DockerHub') {

        //     environment {
        //         userVar = null
        //         passVar = null
        //         withCredentials([usernamePassword(credentialsId: 'DOCKER_ID', passwordVariable: '', usernameVariable: 'username')]) {
        //             userVar = username
        //         }
        //         registry = '${userVar}/appointment'
        //         echo "Using docker user: ${userVar}/appointment"
        //     }

        //     steps {
        //         sh ''' #!/bin/bash
        //             docker push ${userVar}/appointment-apache:${env.BUILD_NUMBER}
        //         '''
        //         //push to docker-hub
        //         docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {            
        //             website.push("${env.BUILD_NUMBER}")            
        //             website.push("latest")        
        //         } 
        //     }

   
        // }


    //     stage("Verify Docker Images") {
    //         sh ''' #! /bin/bash
    //             docker images
    //         '''
    //     }

    //     stage("Start app") {
    //         sh ''' #! /bin/bash
    //             echo "Starting application.."
    //             cd /
    //             docker-compose up --build
    //         '''
    //     }

    //     stage("Stop App") {
    //         sh ''' #! /bin/bash
    //             echo "Stopping application.."
    //             cd /
    //             docker-compose down
    //         '''
    //     }

    

    
}