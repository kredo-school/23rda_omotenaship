terraform {
  required_providers {
    aws = {
      source  = "hashicorp/aws"
      version = "~> 5.0"
    }
  }
}

#  Terraform が AWS プロバイダを使うための設定
provider "aws" {
  region = "ap-northeast-1" # 東京リージョン
}
