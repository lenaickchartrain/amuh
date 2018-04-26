pipeline {
  agent any
  stages {
    stage('Build') {
      steps {
        sh 'echo "Build step"'
      }
    }
    stage('Test') {
      parallel {
        stage('php') {
          steps {
            sh 'echo "php"'
          }
        }
        stage('php5.6') {
          steps {
            sh 'echo "php 5.6"'
          }
        }
        stage('php7') {
          steps {
            sh 'echo "php 7"'
          }
        }
      }
    }
    stage('Deploy') {
      steps {
        sh 'echo "deploy to server"'
      }
    }
  }
}