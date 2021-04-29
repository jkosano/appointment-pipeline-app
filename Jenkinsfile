node {

        environment {
            dockerImage = ''
            //registry = 'jpk912/appointment'
            // registry = '${userVar}/appointment'
            // echo "Using docker user2: ${userVar}/appointment"
            
            // dockerUsername = 'jpk912'
            // projectName = 'appointment'

            userVar = null
            passVar = null
            withCredentials([usernamePassword(credentialsId: 'DOCKER_ID', passwordVariable: '', usernameVariable: 'username')]) {
                userVar = username
            }
            def registry = "${userVar}/appointment"
        }

        stage('Clone repository') {
            checkout scm
        }
        
        stage('Build apache image') {  
            echo "Workspace is $WORKSPACE"
            echo "REGISTRY is: $REGISTRY"
            echo "Registry is: $registry"
            echo "Registry2 is: ${registry}"
            def dockerUser = "jpk912"
            def projectName = "appointment"
            // dir("$WORKSPACE/apache") {} <--this is a dir block. A prebuilt jenkins equivalent for changing directory
                script {
                    // website = docker.build("jpk912/appointment-apache", "-f apache/Dockerfile .")
                    website = docker.build("$dockerUser" + "/" + "$projectName-apache", "-f apache/Dockerfile .")
                }
        }

        stage('Build sql image') {   
            echo "Workspace is $WORKSPACE"
            script {
                sqlimage = docker.build("$dockerUser" + "/" + "$projectName-apache", "-f sql/Dockerfile .")
            }
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
            echo "Workspace is $WORKSPACE"
            script {
                docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {            
                    //website.push("${env.BUILD_NUMBER}")            
                    website.push("latest")        
                }    
            }

        }

        stage('Push sql image to DockerHub') {
            // sh ''' #!/bin/bash
            //     docker push jpk912/appointment-sql:${env.BUILD_NUMBER}
            // '''
            echo "Workspace is $WORKSPACE"
            script {
                docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {            
                    //sqlimage.push("${env.BUILD_NUMBER}")            
                    sqlimage.push("latest")        
                }    
            }
        }

        stage('Run Trivy'){
            sh '''
                echo "Dollar sign website: $website"
                echo "Dollar sign sqlimage: $sqlimage"
                echo "Using docker user: ${userVar}/appointment"
                echo "Registry variable is: ${registry}
                echo "uservar is: $userVar                

            '''
            // trivy jpk912/$website
            // trivy jpk912/$sqlimage

        }

        stage('Run Anchore'){
            sh '''
                echo "anchore goes here"

            '''
            // anchore name: 'anchor_images'

            //below goes in sh script
            // echo $website > anchor_images
            // echo $sqlimage > anchor_images
        }





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