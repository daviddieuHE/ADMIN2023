FROM ubuntu

RUN apt update 
RUN apt install bind9 -y

COPY named.conf etc/bind/

EXPOSE 53/tcp
EXPOSE 53/udp

CMD ["named","-g"]