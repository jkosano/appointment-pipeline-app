
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

        }

        stages {
            // declarative pipelines have checkout by default

            stage ('Build and Push Apache Container'){
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
                        echo "Apache image built and pushed successfully!"
                    }
                    failure {
                        echo "Apache image failed to build/push"
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
                        echo "SQL image built and pushed successfully!"
                    }
                    failure {
                        echo "SQL image failed to build/push"
                    }
                }
            }

            // stage ('Container Scanning'{
            //     parallel {
            //         stage('Run Trivy'){
            //             // sh '''
            //             //     trivy jpk912/$website
            //             //     trivy jpk912/$sqlimage
            //             // '''
            //             echo "Trivy scanning here...."
            //         }

            //         stage('Run Anchore'){
            //             // sh '''
            //             //     echo "anchore goes here"
            //             //     echo $website > anchor_images
            //             //     echo $sqlimage > anchor_images
            //             // '''
            //             // anchore name: 'anchor_images'

            //             echo "Anchore testing here..."
            //         }
            //     }
            // }
            

        }
    
}