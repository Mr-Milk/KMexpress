InputFile <- function(filename)
{
#dat1 <- read.csv(file=filename,header=TRUE)
dat1<- read.delim(file=filename,header=T,row.names=1,check.names=FALSE)
}
