FROM php:apache
# Copia os arquivos da aplicação para o diretório do servidor web
COPY . /var/www/html/
# Configurações adicionais do Apache
RUN a2enmod rewrite
# Define o diretório de trabalho
WORKDIR /var/www/html/
# Expõe a porta 80 para acesso externo
EXPOSE 80
# Comando para iniciar o servidor web
CMD ["apache2-foreground"]