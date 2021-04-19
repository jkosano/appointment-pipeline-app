node {    

    environment {
        dockerImage = ''
        registry = 'jpk912/appointment'
        // DOCKER_USERNAME = credentials('DOCKER_ID')
        }
    }

      stage('print user') {
            userVar = null
            passVar = null
                withCredentials([usernamePassword(credentialsId: 'DOCKER_ID', passwordVariable: '', usernameVariable: 'username')]) {
                userVar = username
            }
            echo "Using docker user: ${userVar}"
      }

      stage('Clone repository') {               
            
            //checkout scm
      }     
      stage('Build image') {    
            sh ''' #!/bin/bash
                echo "Building apache...."
            '''
            //website = docker.build("jpk912/appointment-apache", "-f apache/Dockerfile .")
       }     
      stage('Test image') {           
            sh '''
                echo "Tests would go here...."
            '''  
        }     
    //    stage('Push image') {

    //         sh ''' #!/bin/bash
    //             echo "Pushing Image...."
    //         '''

    //        //push to docker-hub
    //         docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {            
    //             website.push("${env.BUILD_NUMBER}")            
    //             website.push("latest")        
    //         }   
            
    //     }
}