build:
	docker build -t myers-triangle:java .

init:
	./gradlew wrapper clean build

bash:
	docker run -v $(CURDIR):/opt/project -w /opt/project --name myers-triangle-java --rm -it myers-triangle:java bash

java:
	docker run -v $(CURDIR):/opt/project -w /opt/project --name myers-triangle-java --rm -it myers-triangle:java jshell

test:
	./gradlew test

