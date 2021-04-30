node {
        def projectName = "appointment"

        //get docker username from credentials for docker push
        dockerUser = null
        passVar = null
        withCredentials([usernamePassword(credentialsId: 'DOCKER_ID', passwordVariable: '', usernameVariable: 'username')]) {
            dockerUser = username
        }
        
        //def registry = "${userVar}/appointment"


        environment {
            dockerImage = ''

        }

        stage('Clone repository') {
            checkout scm
        }
        
        stage('Build apache image') {  
            echo "Workspace is $WORKSPACE"
            // def dockerUser = "jpk912"
            // def projectName = "appointment"

            // dir("$WORKSPACE/apache") {} <--this is a dir block. A prebuilt jenkins equivalent for changing directory
                script {
                    // website = docker.build("jpk912/appointment-apache", "-f apache/Dockerfile .")
                    sh "echo Your docker username is: ${dockerUser}"
                    website = docker.build("$dockerUser" + "/" + "$projectName-apache", "-f apache/Dockerfile .")
                }

        }

        // stage('Build sql image') {   
        //     echo "Workspace is $WORKSPACE"
        //     script {
        //         sqlimage = docker.build("$dockerUser" + "/" + "$projectName-apache", "-f sql/Dockerfile .")
        //     }
        // }   

        stage('Test image') {           
                sh '''
                    echo "Tests would go here...."
                '''  
        }     
        
        stage('Push apache image to DockerHub') {
            echo "Workspace is $WORKSPACE"
            script {
                docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {            
                    //website.push("${env.BUILD_NUMBER}")            
                    website.push("latest")        
                }    
            }

        }

        // stage('Push sql image to DockerHub') {
        //     // sh ''' #!/bin/bash
        //     //     docker push jpk912/appointment-sql:${env.BUILD_NUMBER}
        //     // '''
        //     echo "Workspace is $WORKSPACE"
        //     script {
        //         docker.withRegistry('https://registry.hub.docker.com', 'DOCKER_ID') {            
        //             //sqlimage.push("${env.BUILD_NUMBER}")            
        //             sqlimage.push("latest")        
        //         }    
        //     }
        // }



        stage ('Container Scanning'{
            parallel {
                stage('Run Trivy'){
                    sh '''
                        trivy jpk912/$website
                        trivy jpk912/$sqlimage
                    '''
                }

                stage('Run Anchore'){
                    sh '''
                        echo "anchore goes here"
                        echo $website > anchor_images
                        echo $sqlimage > anchor_images

                    '''
                    // anchore name: 'anchor_images'

                    //below goes in sh script
                }
            }
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