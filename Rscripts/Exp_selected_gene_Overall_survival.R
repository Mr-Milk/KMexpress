Exp_selected_gene_Overall_survival<-function(exp,GeneSymbol,Samples)
{



SurvivalType="Overall_survival"
GeneAnnotation=exp[1]
exp<-exp[,-1]
if (length(GeneSymbol)==1){
##match KLK3_ 
#test_exp<-exp[grep(paste("^", GeneSymbol,"_",sep=""), rownames(exp)),]
test_exp<-exp[GeneAnnotation==GeneSymbol,]
test_exp<-t(test_exp)
test_exp<-data.frame(test_exp)
}

x=0;


if (length(GeneSymbol)>1) {
df<-data.frame(matrix(NA, nrow =dim(exp)[2], ncol = 1))
for (i in 1:length(GeneSymbol)) {

test_exp<-exp[GeneAnnotation==GeneSymbol[i],]
test_exp<-t(test_exp)
test_exp<-data.frame(test_exp)
df<-cbind(df,test_exp)
rm(test_exp)
x<-x+1;
    }
#}
test_exp1<-df[, colSums(is.na(df)) != nrow(df)]
test_temp<-rowMeans(test_exp1)
test_exp<-data.frame(test_temp)
rownames(test_exp)<-rownames(test_exp1)
colnames(test_exp)<-"Average_exp"
rm(test_temp)
rm(test_exp1)
rm(df)
}



###################################################################
test_clinical<-Samples[,grep(SurvivalType, colnames(Samples))]
###################################################################
###################################################################
x1<-grep(SurvivalType, colnames(Samples))#################################
test_clinical<-data.frame(test_clinical)
rownames(test_clinical)<-rownames(Samples)
colnames(test_clinical)<-colnames(Samples)[x1]
rm(x1)
new_test_clinical<-test_clinical
new_test_clinical <- new_test_clinical[order(row.names(new_test_clinical)), ]


test_SurvivalTime<-Samples[,grep("Time|time", colnames(Samples))]#time column
test_SurvivalTime<-data.frame(test_SurvivalTime)
rownames(test_SurvivalTime)<-rownames(Samples)

colnames(test_SurvivalTime)<-"Time"


new_test_SurvivalTime<-test_SurvivalTime
new_test_SurvivalTime<-new_test_SurvivalTime[order(row.names(new_test_SurvivalTime)), ]
new_test_exp<-test_exp[order(row.names(test_exp)), ]
new_test_exp<-data.frame(new_test_exp)
colnames(new_test_exp)<-colnames(test_exp)
#combines clinical info with expression
test<- cbind(new_test_SurvivalTime,new_test_clinical,new_test_exp) 
test<- cbind(new_test_SurvivalTime,new_test_clinical,new_test_exp)
#==================================================
a<-colnames(exp)
a_sort<-a[order(a)]
rownames(test)=a_sort
#==================================================





#colnames, new_test_SurvivalTime,new_test_clinical,KLK3_354,KLK3_7047
#remove samples without selected phenotype
#NA,[Not Available],[Unknown],[Discrepancy],
toMatch<-c("NA","Not Available","Unknown","Discrepancy")
if(length(grep(paste(toMatch,collapse="|"), as.character(test$new_test_clinical)))==0)
test_final<-test
if(length(grep(paste(toMatch,collapse="|"), as.character(test$new_test_clinical)))!=0)
test_final<-test[-grep(paste(toMatch,collapse="|"), as.character(test$new_test_clinical)),]
colnames(test_final)[1]="Time" #rename col,Survival Time
colnames(test_final)[2]="Outcome"#rename outcome

#define status to 0 and 1
colnames(test_final)[1]="Time" #rename col,Survival Time
colnames(test_final)[2]="Outcome"#rename outcome
test_final$Outcome<-ifelse(test_final$Outcome=='YES'|test_final$Outcome=='WITH TUMOR'|test_final$Outcome=='Dead',1,0)
if(length(grep("Not Available", as.character(test_final$Time)))!=0)
test_final<-test_final[-grep("Not Available", as.character(test_final$Time)),]
time1_loc<-which(as.numeric(as.character(test_final$Time))<0.00000001)
if (length(time1_loc)!=0)
test_final<-test_final[-time1_loc,]
test_final$Time<-as.numeric(as.character(test_final$Time))
rm(time1_loc)

return(test_final)
#input data is test_final, similar as data in "Book3.csv"
}