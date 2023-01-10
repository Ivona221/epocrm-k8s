## How to deploy

1. Create e kubernetes cluster (we currently do not have script to do this)
2. Install azure cli on the machine you are working on (Check out the [Guide](https://learn.microsoft.com/en-us/cli/azure/install-azure-cli))
3. Install kubernetes-cli (Check out the [Guide](https://kubernetes.io/docs/tasks/tools/))
4. Connect to the cluster
```bash
az aks get-credentials --resource-group resource-group-name --name cluster-name
```
5. Create an Azure MySQL resource (we currently do not have a script to do this)
6. If you want to create a new app copy the file app1-deployment.yaml and replace all **app1** occurances with the name of the application you want to create for example **appx**.
7. Run 
```bash
kubectl apply -f appx-deployment.yaml
```
This will create **app service**, **deamon**, **web socket service**, **persistent storage** and **ingress**. Currently all the apps are separated inside of the cluster with namespaces meaning that for each set of (service, deamon, websocket and ingress there is a separate namespace created).

8. In order for this setup to work we need to set up DNS and domains for each app. Currently the apps are on the same domain but they have different subdomains.
9. When we define the variable ESPOCRM_DATABASE_NAME during the installation a new database is created for each app in the same resource.
10. If we want to check logs of the pod and see if the espocrm installation went well we run
```bash
kubectl logs name-of-the-pod
```

## Next steps

1. Define a way how to easily deploy the solution (terraform scrips, Azure DevOps pipelines)
2. Make a virtual network for the databse resource and the kubernetes cluster
3. Set up DNS with proper domain names and set up SSL
4. Make a test deployment on the azure subscription of The Red Cross.
5. Migrate existing apps if necessary.