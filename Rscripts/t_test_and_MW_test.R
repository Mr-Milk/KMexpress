Args <- commandArgs()

sample1=Args[6]
sample2=Args[7]
output_folder=Args[8]
group1=Args[9]
group2=Args[10]

x=unique(as.numeric(unlist(strsplit(sample1, ","))))
y=unique(as.numeric(unlist(strsplit(sample2, ","))))
x=x[!is.na(x)]
y=y[!is.na(y)]

print(x)
print(y)

print(output_folder)
setwd(output_folder)



require(stats)
#t_test_and_MW_test<-function(x,y)
#input two columns x,y
#x <- c(0.80, 0.83, 1.89, 1.04, 1.45, 1.38, 1.91, 1.64, 0.73, 1.46)
#y <- c(1.15, 0.88, 0.90, 0.74, 1.21)
#wilcox.test(x, y)
#pvalue<-wilcox.test(x, y)
#print("a")

#p_utest<-round(pvalue$p.value,4)
#print(p_utest)
#pvalue<-t.test(x,y)
#print("b")

#p_ttest<-round(pvalue$p.value,4)
#print(p_ttest)

#png(file ="differential_p_value.png", height = 720, width =720, units="px",bg="white", res=150,type = "cairo")



#t_test_and_MW_test<-function(x,y)
#{
#input two columns x,y
#x <- c(0.80, 0.83, 1.89, 1.04, 1.45, 1.38, 1.91, 1.64, 0.73, 1.46)
#y <- c(1.15, 0.88, 0.90, 0.74, 1.21)

pvalue<-wilcox.test(x, y)
p_utest<-round(pvalue$p.value,4)
pvalue<-t.test(x,y)
p_ttest<-round(pvalue$p.value,4)

png(file ="differential_p_value.png", height = 800, width =800, units="px",bg="white", res=150)
#png(file ="differential p value.png", height = 720, width =720, units="px",bg="white", res=150)
#par(mfrow=c(2,1))
par(mfrow=c(2,1),oma = c(1,4,4,0) + 0.1,mar = c(4,4,0,0))
#par(mfrow = c(2,1), mar=c(2, 4, 3, 1)) #it goes c(bottom, left, top, right)
dx<-density(as.matrix(x))
dy<-density(as.matrix(y))

ylim=max(dx$y,dy$y)+0.3
#x_min<-min(x,y)
x_max<-max(max(dx$x),max(dy$x))
#plot(dx,xlab="Expression in group1",ylab="Density",main="",xlim=c(x_min,x_max))
plot(dx,xlab="",ylab="Density",main="",xlim=c(0,x_max),ylim=c(0,ylim))

polygon(dx, col="#FF5151", border="#FF5151")#fill the density plot
name1<-paste("p value of Mann Whitney U test is ",p_utest)
name2<-paste("p value of Student's t-test is ",p_ttest)
names_main<-paste(name1,name2,sep="\n")
legend("topleft",c(group1),pch=7,pt.lwd=8,col="#FF5151",bty = "n")
#title(main=names_main)
#text(0.5,1.5,paste("p value of Student's t-test is ",p_ttest),pos=4)
mtext(names_main,side=3,line=0.8)

dy<-density(as.matrix(y))
#plot(d,xlab="Expression in group2",ylab="Density",main="",xlim=c(x_min,x_max))
plot(dy,xlab="Input value",ylab="Density",main="",xlim=c(0,x_max),ylim=c(0,ylim))
polygon(dy, col="#1E90FF", border="#1E90FF")#fill the density plot
legend("topleft",c(group2),pch=7,pt.lwd=8,col="#1E90FF",bty = "n")
dev.off()
#}



