kmplot_RFS<-function(test_final,km_type){
require(survival)
data<-test_final
if (dim(data)[2]==3)
#single gene and single transcript
	{
		genes<-colnames(data)[3]
		p<-matrix(,1,5)
		HR<-matrix(,1,5)
		Expression=colnames(data)[3]
		dat<-data
		colnames(dat)[3]<-c("Expression")

		Q1=quantile(dat$Expression,0.25)#25%
		median=quantile(dat$Expression,0.5)#50%
		Q3=quantile(dat$Expression,0.75)#75%
		average=mean(dat$Expression)

		#dat$Q11high<-c(dim(dat)[1],1);

		dat$Q11high<-dat$Expression;
		#a<-grep("^Q1!Q3",km_type)
		a<-grep("^Q1",km_type)
	if (length(a)==1){
		#dat$Q11high=ifelse(dat$Q11high>Q1,1,2);
		dat$Q11high=ifelse(dat$Q11high>Q1,1,2);}
		a<-grep("^Q3",km_type)
		if (length(a)==1){
			dat$Q11high=ifelse(dat$Q11high>Q3,1,2);}
			a<-grep("^median",km_type)
			if (length(a)==1){
				dat$Q11high=ifelse(dat$Q11high>median,1,2);}
				a<-grep("^average",km_type)
				if (length(a)==1){
					dat$Q11high=ifelse(dat$Q11high>average,1,2);
				}	
			a<-grep("^Q3Q1",km_type)
			if (length(a)==1){
				dat<-dat[(dat$Expression>Q3)|(dat$Expression<=Q1),1:3];#only the survival,censor, expression colunms
				dat$Q11high<-dat$Expression;
				dat$Q11high=ifelse(dat$Expression>Q3,1,2);
				dat$Q11high=ifelse(dat$Expression<=Q1,2,1);
				b<-grep("Expression",colnames(dat));
			if (length(b)==1){
				dat<- dat[,-b];}
			}			
filename=paste(Expression,"_Recurrence_free_survival",".pdf",sep="")
pdf(file =filename,onefile=TRUE,paper = "special", height = 8, width = 8)
#change height and width according to number of figures
a<-coxph(Surv(dat$Time, dat$Outcome) ~ dat$Q11high) 
coeffs <- coef(summary(a))
temp<-as.matrix(coeffs)#temp,col1 coef;col2 exp(coef);col3 se(coef);col4 z;col5 pr(>|z|)
#p[i,1]=temp[5]
#HR[i,1]=temp[2]
fit<-survfit(Surv(dat$Time,dat$Outcome)~dat$Q11high)
par(mar = c(6,1,1,0),oma = c(1,1,1,1))
plot(fit,col=c("red","green"),xlab="Time(months)",ylab="Recurrence Free Survival",lwd=4)
legend("topright",c("high","low"),col=c("red","green"),lwd=2)
p1=round(temp[5],4)#4 is number of digitals
HR1=round(temp[2],4)
mtext(paste("logrank p=",as.character(p1), sep=""), side = 1, line = -2.4, adj = 1, cex = 1.2, outer = TRUE)
mtext(paste("Hazard ratio=",as.character(HR1), sep=""), side = 1, line = -1.2, adj = 1, cex = 1.2, outer = TRUE)
mtext(paste(Expression,km_type, sep="_"), side = 1, line = 0, adj = 1, cex = 1.2, outer = TRUE)

#text(pos=4,quantile(dat$Time,0.05),0.5,paste("logrank p=",as.character(p1), sep=""))
#text(pos=4,quantile(dat$Time,0.05),0.4,paste("Hazard ratio=",as.character(HR1), sep=""))
#text(pos=4,quantile(dat$Time,0.05),0.3,paste(Expression,km_type, sep="_"))
remove(a)
dev.off()
filename=paste(Expression,"_Recurrence_free_survival",".png",sep="")
png(file =filename, height = 1500, width =1550, units="px",bg="white", res=200)
#change height and width according to number of figures
a<-coxph(Surv(dat$Time, dat$Outcome) ~ dat$Q11high) 
coeffs <- coef(summary(a))
temp<-as.matrix(coeffs)#temp,col1 coef;col2 exp(coef);col3 se(coef);col4 z;col5 pr(>|z|)
#p[i,1]=temp[5]
#HR[i,1]=temp[2]
fit<-survfit(Surv(dat$Time,dat$Outcome)~dat$Q11high)
par(mar = c(6,1,1,0),oma = c(1,1,1,1))
plot(fit,col=c("red","green"),xlab="Time(months)",ylab="Recurrence Free Survival",lwd=4)
legend("topright",c("high","low"),col=c("red","green"),lwd=2)
p1=round(temp[5],4)#4 is number of digitals
HR1=round(temp[2],4)
mtext(paste("logrank p=",as.character(p1), sep=""), side = 1, line = -2.4, adj = 1, cex = 1.2, outer = TRUE)
mtext(paste("Hazard ratio=",as.character(HR1), sep=""), side = 1, line = -1.2, adj = 1, cex = 1.2, outer = TRUE)
mtext(paste(Expression,km_type, sep="_"), side = 1, line = 0, adj = 1, cex = 1.2, outer = TRUE)

#text(pos=4,quantile(dat$Time,0.05),0.5,paste("  logrank p=",as.character(p1), sep=""))
#text(pos=4,quantile(dat$Time,0.05),0.4,paste("  Hazard ratio=",as.character(HR1), sep=""))
#text(pos=4,quantile(dat$Time,0.05),0.3,paste(Expression,km_type, sep="_"))
remove(a)
dev.off()
}

if (dim(data)[2]>3)
{
#multiple genes or multiple transcript
end=ncol(data)
Exp=data[,3:end]
survival<-data[,1:2]
genes<-colnames(data)[3:end]
p<-matrix(,dim(Exp)[2],5)
HR<-matrix(,dim(Exp)[2],5)
for (i in 1:dim(Exp)[2]) {

#for gene i
Expression=genes[i]
dat<-cbind(survival,Exp[,i])
colnames(dat)[3]<-c("Expression")
Q1=quantile(dat$Expression,0.25)#25%
median=quantile(dat$Expression,0.5)#50%
Q3=quantile(dat$Expression,0.75)#75%
average=mean(dat$Expression)

#dat$Q11high<-c(dim(dat)[1],1);
dat$Q11high<-dat$Expression;
dat$Q11high=ifelse(dat$Q11high>Q1,1,2);
#Q1, 1high,2 low;

filename=paste(Expression,"_Recurrence_free_survival",".pdf",sep="")
pdf(file =filename,onefile=TRUE,paper = "special", height = 8, width = 8)
#change height and width according to number of figures
a<-coxph(Surv(dat$Time, dat$Outcome) ~ dat$Q11high) 
coeffs <- coef(summary(a))
temp<-as.matrix(coeffs)#temp,col1 coef;col2 exp(coef);col3 se(coef);col4 z;col5 pr(>|z|)
p[i,1]=temp[5]
HR[i,1]=temp[2]
fit<-survfit(Surv(dat$Time,dat$Outcome)~dat$Q11high)
par(mar = c(6,1,1,0),oma = c(1,1,1,1))
plot(fit,col=c("red","green"),xlab="Time(months)",ylab="Recurrence Free Survival",lwd=4)
legend("topright",c("high","low"),col=c("red","green"),lwd=2)
p1=round(temp[5],4)#4 is number of digitals
HR1=round(temp[2],4)
mtext(paste("logrank p=",as.character(p1), sep=""), side = 1, line = -2.4, adj = 1, cex = 1.2, outer = TRUE)
mtext(paste("Hazard ratio=",as.character(HR1), sep=""), side = 1, line = -1.2, adj = 1, cex = 1.2, outer = TRUE)
mtext(paste(Expression,km_type, sep="_"), side = 1, line = 0, adj = 1, cex = 1.2, outer = TRUE)
#text(pos=4,quantile(dat$Time,0.05),0.5,paste("logrank p=",as.character(p1), sep=""))
#text(pos=4,quantile(dat$Time,0.05),0.4,paste("Hazard ratio=",as.character(HR1), sep=""))
#text(pos=4,quantile(dat$Time,0.05),0.3,paste(Expression,km_type, sep="_"))
remove(a)
dev.off()
filename=paste(Expression,"_Recurrence_free_survival",".png",sep="")
png(file =filename, height = 800, width =800, units="px",bg="white", res=150)
#change height and width according to number of figures
a<-coxph(Surv(dat$Time, dat$Outcome) ~ dat$Q11high) 
coeffs <- coef(summary(a))
temp<-as.matrix(coeffs)#temp,col1 coef;col2 exp(coef);col3 se(coef);col4 z;col5 pr(>|z|)
p[i,1]=temp[5]
HR[i,1]=temp[2]
fit<-survfit(Surv(dat$Time,dat$Outcome)~dat$Q11high)
par(mar = c(6,1,1,0),oma = c(1,1,1,1))
plot(fit,col=c("red","green"),xlab="Time(months)",ylab="Recurrence Free Survival",lwd=4)
legend("topright",c("high","low"),col=c("red","green"),lwd=2)
p1=round(temp[5],4)#4 is number of digitals
HR1=round(temp[2],4)
#text(quantile(dat$Time,0.75),1,paste("logrank p=",as.character(p1), sep=""))
#text(quantile(dat$Time,0.75),0.9,paste("Hazard ratio=",as.character(HR1), sep=""))
#text(quantile(dat$Time,0.75),0.8,paste(Expression,km_type, sep="_"))
mtext(paste("logrank p=",as.character(p1), sep=""), side = 1, line = -2.4, adj = 1, cex = 1.2, outer = TRUE)
mtext(paste("Hazard ratio=",as.character(HR1), sep=""), side = 1, line = -1.2, adj = 1, cex = 1.2, outer = TRUE)
mtext(paste(Expression,km_type, sep="_"), side = 1, line = 0, adj = 1, cex = 1.2, outer = TRUE)

#text(pos=4,quantile(dat$Time,0.05),1,paste("logrank p=",as.character(p1), sep=""))
#text(pos=4,quantile(dat$Time,0.05),0.4,paste("Hazard ratio=",as.character(HR1), sep=""))
#text(pos=4,quantile(dat$Time,0.05),0.3,paste(Expression,km_type, sep="_"))
remove(a)
dev.off()

  }
}

}

