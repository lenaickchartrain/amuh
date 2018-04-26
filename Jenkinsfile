pipeline{
    agent any
    stages{
        stage('Build'){
            steps{
                echo 'Build step'
            }
        }
        stage('Tests'){
            steps{
                echo 'Test step'
            }
        }
        stage('Deploy Dev'){
            when{
                branch 'dev'
            }
            steps{
                echo 'Deploy development step'
            }
        }
        stage('Deploy Prod'){
            when{
                branch 'master'
            }
            steps{
                echo 'Deploy production step'
            }
        }
    }
}
