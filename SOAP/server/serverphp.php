<!--tns: è un identificativo univoco per quella risorsa, tns=target name space, evita conflitti tra nomi uguali ma di serivizi diversi-->
<definitions name="servizio" 
      xmlns = "http://schemas.xmlsoap.org/wsdl/"
      xmlns:soap = "http://schemas.xmlsoap.org/wsdl/soap/"
      xmlns:tns = "urn:conversione"
      xmlns:xsd = "http://www.w3.org/2001/XMLSchema">

  <message name="richiesta">
    <part name="lunghezza" type= "xsd:string"/>
    <part name="scala" type= "xsd:string"/>
  </message>

  <message name="risposta">
    <part name = "conversione" type = "xsd:string"/>
  </message>

  <portType name = "conversionePortType">
          <operation name = "conversione">
              <input message = "tns:richiesta"/>
              <output message = "tns:risposta"/>
          </operation>
      </portType>
    <!--defiinizone del protocollo binding, name da il nome a questa binding, il type collega il binding a un portType-->
    <binding name = "conversioneBinding" type = "tns:conversionePortType">
    <!--specifica l'uso di soap da parte del binding, rpc= remote procedure call, il transport è http-->
        <soap:binding style = "rpc"
                      transport = "http://schemas.xmlsoap.org/soap/http"/>
        <!--inserisci il nome dell'operazione del server-->
        <operation name = "conversione">
            <soap:operation soapAction = "conversione"/>
            <input>
            <!--urn= Uniform Resource Name, indica un nome univoco, a contrario di URI non definisce la posizione, si usa quando non hai un http reale-->
                <soap:body
                        encodingStyle = "http://schemas.xmlsoap.org/soap/encoding/"
                        namespace = "urn:conversione"
                        use = "encoded"/>
            </input>

            <output>
                <soap:body
                        encodingStyle = "http://schemas.xmlsoap.org/soap/encoding/"
                        namespace = "urn:conversione"
                        use = "encoded"/>
            </output>
        </operation>
    </binding>

     <service name = "conversioneServizio">
        <documentation>Server</documentation>
        <port binding = "tns:conversioneBinding" name = "conversionePorta">
            <soap:address location = "http://127.0.0.1/soap/server2/server2.php/" /> 
        </port>
        <!--soap:address location indirizza al server-->
    </service>
</definitions>
