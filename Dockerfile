FROM golang:latest
ENV GOPATH $GOPATH:/go/src
RUN apt-get update && \
    apt-get upgrade -y
RUN go get github.com/revel/revel && \
    go get github.com/revel/cmd/revel
RUN mkdir /go/src/OthloTech
EXPOSE 9000
