#include <ESP8266WiFi.h>

WiFiClient client;

const char* ssid     = "PhanNgocAiVi-oc";
const char* password = "hoiconvidi";

#define HOST "192.168.137.1"
#define PORT 8080
#define API_PATH "/NLNganh/server/?mod=api&act=get-status&token="
#define TOKEN "tHLP6qU5MGoJj8gPkIlG"

void setup() {
  // init serial
  Serial.begin(115200);

  // wifi setup
  setupWiFi();

  pinMode(14, OUTPUT);
  pinMode(12, OUTPUT);
  pinMode(13, OUTPUT);
  pinMode(15, OUTPUT);
}

void loop() {
  String response = requestApi();
  processResponse(response);
}

void setupWiFi() {
  Serial.println();
  Serial.println();
  Serial.print("Connecting to ");
  Serial.println(ssid);
  
  WiFi.begin(ssid, password);
  
  while (WiFi.status() != WL_CONNECTED) {
    delay(500);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi connected");  
  Serial.println("IP address: ");
  Serial.println(WiFi.localIP());
}

void processResponse(String response) {
  //Serial.println(response);

  int status[] = {0, 0, 0, 0};
  
  if (response[5] == '1') {
    status[0] = 1;
    digitalWrite(14, LOW);
  } else {
    digitalWrite(14, HIGH);
  }

  if (response[10] == '1') {
    status[1] = 1; 
    digitalWrite(12, LOW);
  } else {
    digitalWrite(12, HIGH);
  }

  if (response[15] == '1') {
    status[2] = 1;
    digitalWrite(13, LOW);
  } else {
    digitalWrite(13, HIGH);
  }

  if (response[20] == '1') {
    status[3] = 1;
    digitalWrite(15, LOW);
  } else {
    digitalWrite(15, HIGH);
  }

  Serial.println("D5 - " + String(status[0]));
  Serial.println("D6 - " + String(status[1]));
  Serial.println("D7 - " + String(status[2]));
  Serial.println("D8 - " + String(status[3]));
//  digitalWrite(D5, status[0]);
//  digitalWrite(D6, status[1]);
//  digitalWrite(D7, status[2]);
//  digitalWrite(D8, status[3]);
}

String requestApi() {
  Serial.println("connect sv");
  if (!client.connect(HOST, PORT)) {
    Serial.println("connection failed");
    return "err_connect_server$";
  }
  
  String url = API_PATH "" TOKEN;
  Serial.println(url);
  client.print(String("GET ") + url + " HTTP/1.1\r\n" +
               "Host: " HOST "\r\n" + 
               "Connection: close\r\n\r\n");
  delay(10);

  String response = "";
  unsigned long now = millis();
  
  while (millis() - now < 5000L) { 
    bool currentLineIsBlank = true;
    bool clearHeader = false;
    bool avail;
    int ch_count = 0;
    
    while(client.available()) {
      avail = clearHeader;
      char c = client.read();

      if(!clearHeader){
        if (currentLineIsBlank && c == '\n') {
          clearHeader = true;
        }
      } else {
        if (ch_count < 1000)  {
          response += c;
          ch_count++;
          if (c == '$') return response;
        }
      }

      if (c == '\n') {
        currentLineIsBlank = true;
      }else if (c != '\r') {
        currentLineIsBlank = false;
      }
    }
  }

  return response;
}
