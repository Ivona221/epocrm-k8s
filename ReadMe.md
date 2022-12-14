## How to deploy

1. Create a kubernetes cluster in [Azure](https://azure.microsoft.com/nl-nl/products/kubernetes-service/)
2. Install azure cli on the machine you are working on (Check out the [Guide](https://learn.microsoft.com/en-us/cli/azure/install-azure-cli))
3. Install kubernetes-cli (Check out the [Guide](https://kubernetes.io/docs/tasks/tools/))
4. Connect to the cluster
```bash
az aks get-credentials --resource-group resource-group-name --name cluster-name
```
5. Create an Azure MySQL resource

After the creation of the database resource, note the following variables:
- Host: {server_name}.mysql.database.azure.com
- Username: {db_user}
- Password: {db_password}
6. Set up DNS and domain name for the new app
7. If you want to create a new app copy the file app-deployment.yaml and replace the following variables:
- {{NAMESPACE_NAME}} with a new namespace name
- {{DATABASE_HOST}} with the Azure Databse host name ({server_name}.mysql.database.azure.com)
- {{DATABASE_PASSWORD}} with the Azure database password
- {{DATABASE_NAME}} with a new database name for the application (When we define the variable ESPOCRM_DATABASE_NAME during the installation a new database is created for each app on the same server)
- {{DATABASE_USER}} with {db_user}@{server_name}
- {{SITE_DOMAIN}} with the app domain
8. Run 
```bash
kubectl apply -f {app_name}-deployment.yaml
```
This will create **app service**, **daemon**, **web socket service**, **persistent storage** and **ingress**. Currently all the apps are separated inside of the cluster with namespaces meaning that for each set of service, daemon, websocket and ingress there is a separate namespace created.

9. If we want to check logs of the pod and see if the espocrm installation went well we run
```bash
kubectl logs name-of-the-pod
```

## Next steps

1. Define a way how to easily deploy the solution (terraform scrips, Azure DevOps pipelines or a bash script will be enough)
2. Make a virtual network for the databse resource and the kubernetes cluster
3. Set up DNS with proper domain names and set up SSL
4. Make a test deployment on the azure subscription of The Red Cross.
5. Migrate existing apps if necessary.
