Boxplot_clinical_without_survival_revised_noLog2<-function(Samples,GeneSymbol,exp,Dataset)
{

#ClinicalType="gleason|pathologic|psa|lymph|residual|clinical"
ClinicalType="Gleason|gleason|content|grade|status|subtype|CellLine|Phenotype|stage|pathologic|residual|clinical|invasion|diffuse|score"
GeneAnnotation=exp[1]
xlabelStyle<-c(1,2)
exp<-exp[,-1]
#for example
clinical<-Samples[,grep(ClinicalType, colnames(Samples))]
clinical<-data.frame(clinical);
row.names(clinical)=row.names(Samples);

new_clinical<-clinical[order(row.names(clinical)), ]
row_names<-row.names(clinical);
row_names<-sort(row_names)

##
new_clinical<-data.frame(new_clinical);
row.names(new_clinical)=row_names;
if (dim(clinical)[2]==1){
colnames(new_clinical)="Phenotype"
}

#input gene expression
test_exp1<-exp[GeneAnnotation==GeneSymbol,]
#test_exp1<-log2(test_exp1+1)
test_exp<-data.frame(t(test_exp1))
row.names(test_exp)<-colnames(test_exp1)
colnames(test_exp)<-row.names(test_exp1)
#test_exp<-t(test_exp)
#test_exp<-data.frame(test_exp)

new_test_exp<-test_exp[order(row.names(test_exp)), ]
if (dim(clinical)[2]==1){
new_test_exp<-data.frame(new_test_exp);
row.names(new_test_exp)=row_names;
}

#new_test_exp<-log2(new_test_exp+1)
new_test_exp<-data.frame(new_test_exp)
colnames(new_test_exp)<-colnames(test_exp)

#combines clinical info with expression
#colour=c("steelblue","red","sienna","dodgerblue","brown1","peru","aquamarine3","lightcoral","gold1","cadetblue1","rosybrown1","khaki1","steelblue","red","sienna","dodgerblue","brown1","peru","aquamarine3","lightcoral","gold1","cadetblue1","rosybrown1","khaki1")
colour=c("#9e0142","#d53e4f","#f46d43","#fdae61","#fee08b","#ffffbf","#e6f598","#abdda4","#66c2a5","#3288bd","#5e4fa2","#DA70D6","#9e0142","#d53e4f","#f46d43","#fdae61","#fee08b","#ffffbf","#e6f598","#abdda4","#66c2a5","#3288bd","#5e4fa2","#DA70D6","#9e0142","#d53e4f","#f46d43","#fdae61","#fee08b","#ffffbf","#e6f598","#abdda4","#66c2a5","#3288bd","#5e4fa2")
##multiple clinical information

mainTitle<-paste(GeneSymbol,"expression in",Dataset,sep=" ")
if (dim(new_clinical)[2]>1)
{
#for one clinical parameter j
for (j in 1:dim(new_clinical)[2]) {
#j=1
#remove samples with unavailble clinical parameters 
temp<- cbind(new_test_exp,new_clinical[j])
temp1<-temp 
num<-dim(temp1)[2]
temp1<-subset(temp1, get(colnames(temp1)[num])!="[Not Available]")
temp1<-subset(temp1, get(colnames(temp1)[num])!="[Unknown]")
temp1<-subset(temp1, get(colnames(temp1)[num])!="NA")
temp1<-subset(temp1, get(colnames(temp1)[num])!="[Discrepancy]")
temp1<-subset(temp1, get(colnames(temp1)[num])!="NaN")
temp1<-subset(temp1, get(colnames(temp1)[num])!="NAN")
#look into temp1,last column is clinical paramter
end<-dim(temp1)[2]
name_temp<-paste(GeneSymbol,"expression_in",names(temp1)[end],Dataset,sep="_")
#name_temp<-paste(GeneSymbol,"expression in",Dataset,sep=" ")
csvfile<-paste(name_temp,".csv",sep="")
write.csv(temp1,file=csvfile) 


names(temp1)[end]="group"
dimension<-end-1
temp1$group<- factor(temp1$group)

if (dimension<2)
{
i=1
##calculate fold_pvalue
#temp1<-temp
filename=paste(colnames(temp1)[i],colnames(temp)[end],"fc_pvalue.csv",sep=".")
colnames(temp1)[end]="Phenotype_temp"
phenotype<-factor(temp1$"Phenotype_temp")
labels_factor<-levels(phenotype)
b<-c(rep(0,length(labels_factor)))
for (m in 1:length(labels_factor))
{b[m]<-length(which(temp1$"Phenotype_temp"==labels_factor[m]))
}
rm(m)
## do pair wise comparison
if (max(b)>=3&length(labels_factor)>=2)
{
pvalue<-matrix(0,length(labels_factor),length(labels_factor))
fold<-matrix(0,length(labels_factor),length(labels_factor))
for (m in 1:length(labels_factor))
  for (t in 1:length(labels_factor))
   {pvalue_temp<-wilcox.test(temp1[phenotype==labels_factor[m],i],temp1[phenotype==labels_factor[t],i])
    pvalue[m,t]<-round(pvalue_temp$p.value,4)
    fold_temp<-(mean(temp1[phenotype==labels_factor[m],i])+1)/(mean(temp1[phenotype==labels_factor[t],i])+1)
    fold[m,t]<-round(fold_temp,2)
    rm(fold_temp)
      }
xx<-paste(fold,"(",pvalue,")")
A_xx<-matrix(xx,length(labels_factor),length(labels_factor))
rownames(A_xx)<-labels_factor
colnames(A_xx)<-labels_factor
write.csv(A_xx,filename)
rm(filename,phenotype,labels_factor,b,fold,pvalue,pvalue_temp,xx,A_xx)
}
#rm(filename,phenotype,labels_factor,b,fold,pvalue,pvalue_temp,xx,A_xx)
##complete fold_pvalue

names(temp1)[end]="group"
len<-length(levels(temp1$group))
if (len==1){
boxcolor=colour[1];}
if (len>1){
boxcolor=colour[1:len];
}


if (len<=4){
xlablePostion=xlabelStyle[1];
filename=paste(colnames(temp1)[i],colnames(temp)[end],"pdf",sep=".")
pdf(file =filename,onefile=TRUE,paper = "special", height = 10, width =10)
#par(las=xlablePostion)#
par(las=1)
groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
groups1_temp<-paste(groups_temp,"(",num_temp,")")
temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xlab=paste(colnames(temp1)[i],colnames(temp)[end],sep="_"), ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
box(lwd=5)
dev.off()
}
if (len>4){
xlablePostion=xlabelStyle[1];

filename=paste(colnames(temp1)[i],colnames(temp)[end],"pdf",sep=".")
pdf(file =filename,onefile=TRUE,paper = "special", height = 10, width =10)
par(las=xlablePostion,mar=c(15, 4.1, 4.1, 2.1))#bottom, left, top, and right
groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
groups1_temp<-paste(groups_temp,"(",num_temp,")")

temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xaxt = "n", xlab ="", ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
labels=levels(temp1$group)

text(x =  seq_along(labels), y = par("usr")[3] -0.05, srt =45, adj = 1,labels = labels, xpd = TRUE,cex=0.6,font=2)
#text(x =  seq_along(colnames(temp)[end]), pos = 4, offset =1,y = par("usr")[3]-1 , labels =colnames(temp)[end], xpd = TRUE)
mtext(colnames(temp)[end],side=1,line=3.4,cex=1.5)
box(lwd=5)
dev.off()
}

if (len<=4){
filename=paste(colnames(temp1)[i],colnames(temp)[end],"png",sep=".")
png(file =filename, height = 1000, width =1000, units="px",bg="white", res=150)
par(las=1)

groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
#groups1_temp<-paste(groups_temp,"(",num_temp,")")

temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xlab=paste(colnames(temp1)[i],colnames(temp)[end],sep="_"), ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
box(lwd=5)
dev.off()
}

if (len>4){
filename=paste(colnames(temp1)[i],colnames(temp)[end],"png",sep=".")
png(file =filename, height = 1000, width =1000, units="px",bg="white", res=150)
par(las=1,mar= c(6.5, 4, 4, 2) + 0.1)#c(bottom, left, top, right) 

groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
#groups1_temp<-paste(groups_temp,"(",num_temp,")")
temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xaxt = "n", xlab ="", ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
labels=levels(temp1$group)
#text(x =  seq_along(labels), y = par("usr")[3]-0.05 , srt =45, adj = 1,labels = labels, xpd = TRUE,cex=1.5)

text(x =  seq_along(labels), y = par("usr")[3] -0.05, srt =45, adj = 1,labels = labels, xpd = TRUE,cex=0.6,font=2)
#text(x =  seq_along(colnames(temp)[end]), pos = 4, offset =1,y = par("usr")[3]-1 , labels =colnames(temp)[end], xpd = TRUE)
mtext(colnames(temp)[end],side=1,line=3.4,cex=1.5)
box(lwd=5)
dev.off()
}

}


if (dimension>=2) {
for (i in 1:dimension) {
temp1<-temp
##calculate fold_pvalue
filename=paste(colnames(temp1)[i],colnames(temp)[end],"fc_pvalue.csv",sep=".")
colnames(temp1)[end]="Phenotype_temp"
phenotype<-factor(temp1$"Phenotype_temp")
labels_factor<-levels(phenotype)
b<-c(rep(0,length(labels_factor)))
for (m in 1:length(labels_factor))
{b[m]<-length(which(temp1$"Phenotype_temp"==labels_factor[m]))
}
rm(m)
## do pair wise comparison
if (max(b)>=3&length(labels_factor)>=2)
{
pvalue<-matrix(0,length(labels_factor),length(labels_factor))
fold<-matrix(0,length(labels_factor),length(labels_factor))
for (m in 1:length(labels_factor))
  for (t in 1:length(labels_factor))
   {pvalue_temp<-wilcox.test(temp1[phenotype==labels_factor[m],i],temp1[phenotype==labels_factor[t],i])
    pvalue[m,t]<-round(pvalue_temp$p.value,4)
    fold_temp<-(mean(temp1[phenotype==labels_factor[m],i])+1)/(mean(temp1[phenotype==labels_factor[t],i])+1)
    fold[m,t]<-round(fold_temp,2)
    rm(fold_temp)
      }
xx<-paste(fold,"(",pvalue,")")
A_xx<-matrix(xx,length(labels_factor),length(labels_factor))
rownames(A_xx)<-labels_factor
colnames(A_xx)<-labels_factor
write.csv(A_xx,filename)
rm(filename,phenotype,labels_factor,b,fold,pvalue,pvalue_temp,xx,A_xx)
}
#rm(filename,phenotype,labels_factor,b,fold,pvalue,pvalue_temp,xx,A_xx)
##complete fold_pvalue

names(temp1)[end]="group"
len<-length(levels(temp1$group))
if (len==1){
boxcolor=colour[1];}
if (len>1){
boxcolor=colour[1:len];
}


if (len<=4){
xlablePostion=xlabelStyle[1];
filename=paste(colnames(temp1)[i],colnames(temp)[end],"pdf",sep=".")
pdf(file =filename,onefile=TRUE,paper = "special", height = 10, width =10)
#par(las=xlablePostion)#
par(las=1)
groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
groups1_temp<-paste(groups_temp,"(",num_temp,")")

temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xlab=paste(colnames(temp1)[i],colnames(temp)[end],sep="_"), ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
box(lwd=5)
dev.off()
}
if (len>4){
xlablePostion=xlabelStyle[1];
filename=paste(colnames(temp1)[i],colnames(temp)[end],"pdf",sep=".")
pdf(file =filename,onefile=TRUE,paper = "special", height = 10, width =10)
par(las=xlablePostion,mar=c(15, 4.1, 4.1, 2.1))#bottom, left, top, and right
groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
groups1_temp<-paste(groups_temp,"(",num_temp,")")

temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xaxt = "n", xlab ="", ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
labels=levels(temp1$group)

text(x =  seq_along(labels), y = par("usr")[3] -0.05, srt =45, adj = 1,labels = labels, xpd = TRUE,cex=0.6,font=2)
#text(x =  seq_along(labels), y = par("usr")[3]-0.05 , srt =45, adj = 1,labels = labels, xpd = TRUE,cex=1.5)
#text(x =  seq_along(colnames(temp)[end]), pos = 4, offset =1,y = par("usr")[3]-1 , labels =colnames(temp)[end], xpd = TRUE)
mtext(colnames(temp)[end],side=1,line=3.4,cex=1.5)
box(lwd=5)
dev.off()
}

if (len<=4){
filename=paste(colnames(temp1)[i],colnames(temp)[end],"png",sep=".")
png(file =filename, height = 1000, width =1000, units="px",bg="white", res=150)
par(las=1)

groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
#groups1_temp<-paste(groups_temp,"(",num_temp,")")
temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xlab=paste(colnames(temp1)[i],colnames(temp)[end],sep="_"), ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
box(lwd=5)
dev.off()
}

if (len>4){
filename=paste(colnames(temp1)[i],colnames(temp)[end],"png",sep=".")
png(file =filename, height = 1000, width =1000, units="px",bg="white", res=150)
par(las=1,mar= c(6.5, 4, 4, 2) + 0.1)#c(bottom, left, top, right) 

groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
#groups1_temp<-paste(groups_temp,"(",num_temp,")")
temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xaxt = "n", xlab ="", ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
labels=levels(temp1$group)

text(x =  seq_along(labels), y = par("usr")[3] -0.05, srt =45, adj = 1,labels = labels, xpd = TRUE,cex=0.6,font=2)
#text(x =  seq_along(labels), y = par("usr")[3]-0.05 , srt =45, adj = 1,labels = labels, xpd = TRUE,cex=1.5)
#text(x =  seq_along(colnames(temp)[end]), pos = 4, offset =1,y = par("usr")[3]-1, labels =colnames(temp)[end], xpd = TRUE)
mtext(colnames(temp)[end],side=1,line=3.4,cex=1.5)
box(lwd=5)
dev.off()
}
  }
}
}
}

##single clinical
if (dim(new_clinical)[2]==1)
{
#for one clinical parameter j
j=1
#remove samples with unavailble clinical parameters 
temp<- cbind(new_test_exp,new_clinical[j])
temp1<-temp 
num<-dim(temp1)[2]
temp1<-subset(temp1, get(colnames(temp1)[num])!="[Not Available]")
temp1<-subset(temp1, get(colnames(temp1)[num])!="[Unknown]")
temp1<-subset(temp1, get(colnames(temp1)[num])!="NA")
temp1<-subset(temp1, get(colnames(temp1)[num])!="[Discrepancy]")
end<-dim(temp1)[2]
#write.csv(temp1,"expression level.csv")
name_temp<-paste(GeneSymbol,"expression_in",names(temp1)[end],Dataset,sep="_")
#name_temp<-paste(GeneSymbol,"expression in",Dataset,sep=" ")
csvfile<-paste(name_temp,".csv",sep="")
write.csv(temp1,file=csvfile) 



names(temp1)[end]="group"
dimension<-end-1
temp1$group<- factor(temp1$group)

if (dimension<2)
{
i=1
##calculate fold change p value
filename=paste(colnames(temp1)[i],colnames(temp)[end],"fc_pvalue.csv",sep=".")
colnames(temp1)[end]="Phenotype_temp"
phenotype<-factor(temp1$"Phenotype_temp")
labels_factor<-levels(phenotype)
b<-c(rep(0,length(labels_factor)))
for (m in 1:length(labels_factor))
{b[m]<-length(which(temp1$"Phenotype_temp"==labels_factor[m]))
}
rm(m)
## do pair wise comparison
if (max(b)>=3&length(labels_factor)>=2)
{
pvalue<-matrix(0,length(labels_factor),length(labels_factor))
fold<-matrix(0,length(labels_factor),length(labels_factor))
for (m in 1:length(labels_factor))
  for (t in 1:length(labels_factor))
   {pvalue_temp<-wilcox.test(temp1[phenotype==labels_factor[m],i],temp1[phenotype==labels_factor[t],i])
    pvalue[m,t]<-round(pvalue_temp$p.value,4)
    fold_temp<-(mean(temp1[phenotype==labels_factor[m],i])+1)/(mean(temp1[phenotype==labels_factor[t],i])+1)
    fold[m,t]<-round(fold_temp,2)
    rm(fold_temp)
      }
xx<-paste(fold,"(",pvalue,")")
A_xx<-matrix(xx,length(labels_factor),length(labels_factor))
rownames(A_xx)<-labels_factor
colnames(A_xx)<-labels_factor
write.csv(A_xx,filename)
rm(filename,phenotype,labels_factor,b,fold,pvalue,pvalue_temp,xx,A_xx)
}
#rm(filename,phenotype,labels_factor,b,fold,pvalue,pvalue_temp,xx,A_xx)
##complete fold change p value

names(temp1)[end]="group"
len<-length(levels(temp1$group))
if (len==1){
boxcolor=colour[1];}
if (len>1){
boxcolor=colour[1:len];
}

if (len<=4){
#xlablePostion=xlabelStyle[1];
filename=paste(colnames(temp1)[i],colnames(temp)[end],"pdf",sep=".")
pdf(file =filename,onefile=TRUE,paper = "special", height = 10, width =10)
par(las=1)
groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
groups1_temp<-paste(groups_temp,"(",num_temp,")")

temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xlab=paste(colnames(temp1)[i],colnames(temp)[end],sep="_"), ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
box(lwd=5)
dev.off()
}
if (len>4){
xlablePostion=xlabelStyle[1];
filename=paste(colnames(temp1)[i],colnames(temp)[end],"pdf",sep=".")
pdf(file =filename,onefile=TRUE,paper = "special", height = 10, width =10)
par(las=xlablePostion,mar=c(15, 4.1, 4.1, 2.1))#bottom, left, top, and right
groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
groups1_temp<-paste(groups_temp,"(",num_temp,")")

temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xaxt = "n", xlab ="", ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
labels=levels(temp1$group)

text(x =  seq_along(labels), y = par("usr")[3] -0.05, srt =45, adj = 1,labels = labels, xpd = TRUE,cex=0.6,font=2)#par font=2 is bold
#text(x =  seq_along(labels), y = par("usr")[3]-0.05 , srt =45, adj = 1,labels = labels, xpd = TRUE,cex=1.5)
#text(x =  seq_along(colnames(temp)[end]), pos = 4, offset =1,y = par("usr")[3]-1 , labels =colnames(temp)[end], xpd = TRUE)
mtext(colnames(temp)[end],side=1,line=3.4,cex=1.5)
box(lwd=5)
dev.off()
}

if (len<=4){
filename=paste(colnames(temp1)[i],colnames(temp)[end],"png",sep=".")
png(file =filename, height = 1000, width =1000, units="px",bg="white", res=150)
par(las=1)

groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
#groups1_temp<-paste(groups_temp,"(",num_temp,")")
temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xlab=paste(colnames(temp1)[i],colnames(temp)[end],sep="_"), ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
box(lwd=5)
dev.off()
}

if (len>4){
filename=paste(colnames(temp1)[i],colnames(temp)[end],"png",sep=".")
png(file =filename, height = 800, width =800, units="px",bg="white", res=150)
par(las=1,mar= c(6.5, 4, 4, 2) + 0.1)#c(bottom, left, top, right) )

groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
#groups1_temp<-paste(groups_temp,"(",num_temp,")")
temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xaxt = "n", xlab ="", ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
labels=levels(temp1$group)

text(x =  seq_along(labels), y = par("usr")[3] -0.05, srt =45, adj = 1,labels = labels, xpd = TRUE,cex=0.6,font=2)
#text(x =  seq_along(labels), y = par("usr")[3]-0.05 , srt =45, adj = 1,labels = labels, xpd = TRUE,cex=1.5)
#text(x =  seq_along(colnames(temp)[end]), pos = 4, offset =1,y = par("usr")[3]-1, labels =colnames(temp)[end], xpd = TRUE)
mtext(colnames(temp)[end],side=1,line=3.4,cex=1.5)
box(lwd=5)
dev.off()
}

}



if (dimension>=2) {
for (i in 1:dimension) {

temp1<-temp
##calculate fold change p value
filename=paste(colnames(temp1)[i],colnames(temp)[end],"fc_pvalue.csv",sep=".")
colnames(temp1)[end]="Phenotype_temp"
phenotype<-factor(temp1$"Phenotype_temp")
labels_factor<-levels(phenotype)
b<-c(rep(0,length(labels_factor)))
for (m in 1:length(labels_factor))
{b[m]<-length(which(temp1$"Phenotype_temp"==labels_factor[m]))
}
rm(m)
## do pair wise comparison
if (max(b)>=3&length(labels_factor)>=2)
{
pvalue<-matrix(0,length(labels_factor),length(labels_factor))
fold<-matrix(0,length(labels_factor),length(labels_factor))
for (m in 1:length(labels_factor))
  for (t in 1:length(labels_factor))
   {pvalue_temp<-wilcox.test(temp1[phenotype==labels_factor[m],i],temp1[phenotype==labels_factor[t],i])
    pvalue[m,t]<-round(pvalue_temp$p.value,4)
    fold_temp<-(mean(temp1[phenotype==labels_factor[m],i])+1)/(mean(temp1[phenotype==labels_factor[t],i])+1)
    fold[m,t]<-round(fold_temp,2)
    rm(fold_temp)
      }
xx<-paste(fold,"(",pvalue,")")
A_xx<-matrix(xx,length(labels_factor),length(labels_factor))
rownames(A_xx)<-labels_factor
colnames(A_xx)<-labels_factor
write.csv(A_xx,filename)
rm(filename,phenotype,labels_factor,b,fold,pvalue,pvalue_temp,xx,A_xx)
}
#rm(filename,phenotype,labels_factor,b,fold,pvalue,pvalue_temp,xx,A_xx)
##complete fold change p value


names(temp1)[end]="group"
len<-length(levels(temp1$group))
if (len==1){
boxcolor=colour[1];}
if (len>1){
boxcolor=colour[1:len];
}


if (len<=4){
#xlablePostion=xlabelStyle[1];
filename=paste(colnames(temp1)[i],colnames(temp)[end],"pdf",sep=".")
pdf(file =filename,onefile=TRUE,paper = "special", height = 10, width =10)
par(las=1)
groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
groups1_temp<-paste(groups_temp,"(",num_temp,")")
temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xlab=paste(colnames(temp1)[i],colnames(temp)[end],sep="_"), ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
box(lwd=5)
dev.off()
}
if (len>4){
xlablePostion=xlabelStyle[1];
filename=paste(colnames(temp1)[i],colnames(temp)[end],"pdf",sep=".")
pdf(file =filename,onefile=TRUE,paper = "special", height = 10, width =10)
par(las=xlablePostion,mar=c(15, 4.1, 4.1, 2.1))#bottom, left, top, and right
groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
groups1_temp<-paste(groups_temp,"(",num_temp,")")
temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xaxt = "n", xlab ="", ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
labels=levels(temp1$group)
text(x =  seq_along(labels), y = par("usr")[3] -0.05, srt =45, adj = 1,labels = labels, xpd = TRUE,cex=0.6,font=2)
#text(x =  seq_along(labels), y = par("usr")[3]-0.05 , srt =45, adj = 1,labels = labels, xpd = TRUE,cex=1.5)
#text(x =  seq_along(colnames(temp)[end]), pos = 4, offset =1,y = par("usr")[3]-1 , labels =colnames(temp)[end], xpd = TRUE)
mtext(colnames(temp)[end],side=1,line=3.4,cex=1.5)
box(lwd=5)
dev.off()
}


if (len<=4){
filename=paste(colnames(temp1)[i],colnames(temp)[end],"png",sep=".")
png(file =filename, height = 1000, width =1000, units="px",bg="white", res=150)
par(las=1)

groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
#groups1_temp<-paste(groups_temp,"(",num_temp,")")
temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xlab=paste(colnames(temp1)[i],colnames(temp)[end],sep="_"), ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
box(lwd=5)
dev.off()
}

if (len>4){
filename=paste(colnames(temp1)[i],colnames(temp)[end],"png",sep=".")
png(file =filename, height = 1000, width =1000, units="px",bg="white", res=150)
par(las=1,mar= c(6.5, 4, 4, 2) + 0.1)#c(bottom, left, top, right)

groups_temp<-unique(temp1$group)
num_temp<- matrix(,nrow=length(groups_temp),ncol=1)
for (k in 1:length(groups_temp)) {
num_temp[k,1]<-length(which(temp1$group==groups_temp[k]))
}
#groups1_temp<-paste(groups_temp,"(",num_temp,")")
temp1$group<- factor(temp1$group,levels=unique(temp1$group),labels=groups1_temp)
boxplot(temp1[,i]~temp1$group,data=temp1, xaxt = "n", xlab ="", ylab="Log2 gene expression",col=boxcolor,boxwex = 0.8,staplewex =0.4, outwex = 0.5,lwd=2,boxlwd =4,cex.lab=1.5,cex.axis=1.2,main = paste(strwrap(mainTitle,width =30),collapse = "\n"),cex.main =1.5)
labels=levels(temp1$group)
text(x =  seq_along(labels), y = par("usr")[3] -0.05, srt =45, adj = 1,labels = labels, xpd = TRUE,cex=0.6,font=2)
#text(x =  seq_along(labels), y = par("usr")[3]-0.05 , srt =45, adj = 1,labels = labels, xpd = TRUE,cex=1.5)
#text(x =  seq_along(colnames(temp)[end]), pos = 4, offset =1,y = par("usr")[3]-1, labels =colnames(temp)[end], xpd = TRUE)
mtext(colnames(temp)[end],side=1,line=3.4,cex=1.5)
box(lwd=5)
dev.off()
}
}

  }
  }
}



