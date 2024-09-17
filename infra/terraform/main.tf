# provider.tf：プロバイダの設定
# variables.tf：変数の定義
# vpc.tf：VPCとサブネットのリソース
# network.tf：インターネットゲートウェイとルートテーブル
# security_groups.tf：セキュリティグループ
# key_pair.tf：キーペアのリソース
# rds.tf：RDSインスタンス
# ec2.tf：EC2インスタンス
# outputs.tf：出力の定義


# 必要なこと
# AWS用のSSH用のキーを作成（aws_key_pair）
# これは何のキー？  private_key = file("~/.ssh/deployer.pem")
# AMI IDを取得（AWS のリージョンに対応した最新の Amazon Linux 2 の AMI ID を指定）

# ステップ1：AWSプロバイダの設定
# まず、TerraformでAWSプロバイダを使用するための基本設定を行います。
# terraform.tf
# 実行手順:
# terraform init を実行して、必要なプロバイダを初期化します。

# ステップ2：VPCとサブネットの作成
# AWS上に新しいVPCとパブリックサブネットを作成します。
# vpc.tf
# 実行手順:
# terraform plan で計画を確認します。
# terraform apply でVPCとサブネットを作成します。

# ステップ3：インターネットゲートウェイとルートテーブルの設定
# VPCをインターネットに接続するためのインターネットゲートウェイとルートテーブルを設定します。
# network.tf
# 実行手順:
# terraform plan で計画を確認します。
# terraform apply でネットワーク設定を適用します。

# ステップ4：セキュリティグループの作成
# EC2インスタンスとRDSインスタンスのセキュリティグループを設定します。
# security_groups.tf
# 実行手順:
# 自分のIPアドレスを正しく設定します。
# terraform plan で計画を確認します。
# terraform apply でセキュリティグループを作成します。

# ステップ5：キーペアの作成
# EC2インスタンスにSSHアクセスするためのキーペアを作成します。
# key_pair.tf
# 実行手順:
# ~/.ssh/deployer.pub が存在することを確認します。
# terraform plan で計画を確認します。
# terraform apply でキーペアを作成します。

# ステップ6：RDSインスタンスの作成
# MySQLのRDSインスタンスを設定します。
# variables.tf
# rds.tf
# 実行手順:
# terraform.tfvars ファイルを作成し、以下を追加します。
# terraform plan で計画を確認します。
# terraform apply でRDSインスタンスを作成します。

# ステップ7：EC2インスタンスの作成
# EC2インスタンスを作成し、Laravelアプリケーションをデプロイします。
# ec2.tf
# 実行手順:
# Laravelプロジェクトのパスを正しく設定します。
# 秘密鍵のパスを確認します。
# terraform plan で計画を確認します。
# terraform apply でEC2インスタンスを作成します。

# ステップ8：変数とバックエンドの設定（オプション）
# 必要に応じて、追加の変数やバックエンド設定を行います。
# # variables.tf
# 実行手順:
# terraform.tfvars に以下を追加します。

# ステップ9：各ステップの確認とデバッグ
# 各ステップごとに以下を行います。
# 計画の確認：terraform plan を実行し、リソースの追加や変更点を確認します。
# 適用：terraform apply を実行し、リソースを作成または更新します。
# エラーの確認：エラーが発生した場合、そのステップのコードと設定を見直します。
# ログの確認：Terraformの出力とAWSコンソールを確認し、リソースの状態をチェックします。

# 注意事項：
# SSHアクセス：EC2インスタンスにSSHでアクセスできることを確認してください。
# AMI IDの確認：最新のAmazon Linux 2のAMI IDを使用していますが、必要に応じて確認してください。
# 秘密鍵のパス：private_key = file("~/.ssh/deployer.pem") のパスを正しく設定してください。
# Laravelのプロジェクトパス：ローカルのLaravelプロジェクトのパスをsourceに正しく設定してください。
