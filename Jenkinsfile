node {


        // stage('get user') {
        //     userVar = null
        //     passVar = null
        //     withCredentials([usernamePassword(credentialsId: 'DOCKER_ID', passwordVariable: '', usernameVariable: 'username')]) {
        //         userVar = username
        //     }
        //     registry = '${userVar}/appointment'
        //     echo "Using docker user: ${userVar}/appointment"

        // }    

        environment {
            dockerImage = ''
            //registry = 'jpk912/appointment'
            // registry = '${userVar}/appointment'
            // echo "Using docker user2: ${userVar}/appointment"

        }

        stage('Clone repository') {
            checkout scm
        }

        stage('print'){
            sh '''
                echo "environment variable is: ${registry}"

            '''
        }
        
        stage('Build apache image') {    
            website = docker.build("jpk912/appointment-apache", "-f apache/Dockerfile .")
        }

        stage('Build sql image') {    
            sqlimage = docker.build("jpk912/appointment-sql", "-f sql/Dockerfile .")
        }   

        stage('Test image') {           
                sh '''
                    echo "Tests would go here...."
                '''  
        }     
        
        stage('Push apache image to DockerHub') {
            // sh ''' #!/bin/bash
            //     docker push jpk912/appointment-apache:${env.BUILD_NUMBER}
            // '''

            docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {            
                website.push("${env.BUILD_NUMBER}")            
                website.push("latest")        
            }    
        }

        stage('Push sql image to DockerHub') {
            // sh ''' #!/bin/bash
            //     docker push jpk912/appointment-sql:${env.BUILD_NUMBER}
            // '''

            docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {            
                sqlimage.push("${env.BUILD_NUMBER}")            
                sqlimage.push("latest")        
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