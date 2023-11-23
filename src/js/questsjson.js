var mergedArray = [[["Que dia \u00e9 hoje?","escreve",1,"data"],["Qual o sexo do paciente?","check",2,"M","F"],["Qual o Nome do Hospital?","escreve",1,"Nome do Hospital"],["Qual o nome do paciente?","escreve",1,"nome do paciente"],["Qual a idade do paciente?","escreve",1,"idade do paciente"],["Qual o RG\/CPF do paciente?","escreve",1,"RG\/CPF do paciente"],["Qual o telefone do paciente?","escreve",1,"teleone do paciente"],["Qual o nome do acompanhante?","escreve",1,"nome do acompanhante"],["Qual a idade do acompanhante?","escreve",1,"idade do acompanhante"],["Qual o local da ocorr\u00eancia","escreve",1,"local da ocorr\u00eancia"],["Qual o N\u00b0USB?","escreve",1,"N\u00b0USB"],["Qual o n\u00famero da ocorr\u00eancia?","escreve",1,"N\u00b0OCORR"],["Qual o DESP.?","escreve",1,"DESP."],["Qual o H.CH.?","escreve",1,"H.CH."],["Qual o KM final?","escreve",1,"KM FINAL"],["Quais os c\u00f3digos?","check",2,"C\u00d3D.IR","C\u00d3D.PS"],["Qual o c\u00f3digo SIA\/SUS?","escreve",1,"C\u00d3D. SIA\/SUS"]],[["Qual foi o tipo da ocorr\u00eancia(pr\u00e9-hospitalar)","check",20,"Causado por animais","Com meio de transporte","Desmonoramento\/Deslizamento","Emeg\u00eancia m\u00e9dica","Queda de altura 2M","Tentativa de suic\u00eddio","Queda pr\u00f3pria altura","Afogamento","Agress\u00e3o","Atropelamento","Choque el\u00e9trico","Desabamento","Dom\u00e9stico","Esportivo","Intoxica\u00e7\u00e3o","Queda bicicleta","Queda moto","Queda n\u00edvel <2M","Trabalho","Transfer\u00eancia"],["Avalia\u00e7\u00e3o do paciente(Glasgow)\/N\u00edvel de consci\u00eancia","check",30,"Espont\u00e2neas","Comando verbal","Est\u00edmulo doloroso","Nenhum","Orientado","Confuso","Palavras inapropriadas","Palavras incompreensiveis","Nenhum","Obdece comandos","Localiza dor","Movimento de retirada","Flex\u00e3o anormal","Extens\u00e3o anormal","Nenhuma","Espont\u00e2nea","Comando verbal","Est\u00edmulo doloroso","Nenhuma","Palavras e frases apropriedades","Palavras inapropriadas","Choro persistente ou gritos","Sons incompreensiveis","Nenhuma resposta verbal","Obdece prontanamente","Localiza dor ou est\u00edmulo tatil","Retirada do segmento estimulado","Flex\u00e3o anormal(decortica\u00e7\u00e3o)","Extens\u00e3o anormal(descerebra\u00e7\u00e3o)","Aus\u00eancia(paralisia fl\u00e1cida, hipotonia"],["Sinais Vitais","escreve",10,"Press\u00e3o arterial(mmHg)","Pulso(B.C.M.P)","Respira\u00e7\u00e3o(M.R.M)","Satura\u00e7\u00e3o(%)","Temperatura(\u00b0C)","$>2SEG","$<2SEG","HGT","$Anormal","$Normal"],["Problemas encontrador suspeitos","check",18,"PSIQUI\u00c1TRICO","REPIRAT\u00d3RIO","Dpoc","Inala\u00e7\u00e3o fuma\u00e7a","DIABETES","Hiperglicemia","Hipoclicemia","OBST\u00c9TRICO","Parto emergencial","Gestante","Hemor. excessiva","TRANSPORTE","A\u00e9reo","Cl\u00edcico","Emergencial","P\u00f3s-trauma","Samu","Sem remo\u00e7\u00e3o"],["Sinais e Sintomas","check",52,"Abdomem sesivel ou r\u00edgido","Afundamento de cr\u00e2nio","Agita\u00e7\u00e3o","Amn\u00e9sia","Angina de peito","Apin\u00e9ia","Bradicardia","Bradipin\u00e9ia","Bronco aspirando","Cefal\u00e9ia","Cianose l\u00e1bial","Cianose extremidade","Convul\u00e7\u00e3o","Decortica\u00e7\u00e3o","Deformidade","descerebra\u00e7\u00e3o","Desmaio","Desvio de traqu\u00e9ia","Dispin\u00e9ia","Dor local","Edema generalizado","Edema localizado","Enfisema subcut\u00e2neo","Estase de jugular","Face p\u00e1lida","Hemorragia externa","Hemorragia interna","Hipertens\u00e3o","Hipotens\u00e3o","Nauseas e v\u00f4mitos","Nasoragia","\u00d3bito","Otorr\u00e9ia","OVACE","Parada card\u00edaca","Parada respirat\u00f3ria","Priapismo","Prurido na pele","Pupilas anisoc\u00f3ricas","Pupilas isoc\u00f3ricas","Pupilas reagentes","Pupilas \u00f1 reagentes","Pupilas midri\u00e1ticas","Pupilas mi\u00f3ticas","Sede","Sinal de battle","Sinal de guaxinim","Sudorese","Taquipn\u00e9ia","Taquicardia","Tontura"]],[["Forma de condu\u00e7\u00e3o","check",3,"Deitada","Semi-sentada","Sentada"],["V\u00edtima era","check",10,"Ciclista","Condutor moto","gestante","Pass ban frente","Pass moto","Condutor-carro","Clinico","Trauma","Pass bco tr\u00e1s","Pedestre"],["Decis\u00e3o de transporte","check",4,"&\u2639\ufe0f","Cr\u00edtico","&\ud83e\udd74","inst\u00e1vel","&\ud83d\ude10","Potencialmente Inst\u00e1vel","&\ud83d\ude42","Est\u00e1vel"],["Equipe de atendimento","escreve",5,"M","S1","S2","S3","Demante"],["Objetos recolhidos","escreve",1,"Quais foram: "]],[["Procedimentos efetuados","check",52,"Apira\u00e7\u00e3o","Avalia\u00e7\u00e3o inicial","Avalia\u00e7\u00e3o dirigida","Avalia\u00e7\u00e3o continuada","Chave de rautek","C\u00e2nula de rautek","C\u00e2nula de guedel","Desobstru\u00e7\u00e3o de V.A","Desobstru\u00e7\u00e3o do D.E.A","Emprego do D.E.A","Gerenciamento dos riscos","Limpeza de ferimentos","Curativos","Compressivo","Encravamento","Ocular","Queimadura","Simples","3 pontos","Imobiliza\u00e7\u00e3o","Membro do INF.DIR","Membro do INF.ESQ","Membro do SUP.DIR","Membro do SUP.ESQ","Quadril","Cervical","Maca sobre rodas","Maca rigida","Retirado do capacate","R.C.P","Rolamento 90\u00b0","Rolamento 180\u00b0","Tomada decis\u00e3o","Tratamento de choque","Uso de c\u00e2nula","Uso de colar","Uso KED","Uso TTF","Ventila\u00e7\u00e3o Suporte","Oxigenoterapia","Reanimador","Meios Auxiliares","Celesc","DEF.Civil","IPG\/PC","Samu","Cit","Pol\u00edcia Civil","Pol\u00edcia Militar","PRE","PRF"],["Materiais utilizados descartados (Quant.)","escreve",22,"Ataduras","Cateter tp.oculos","Compressa comum","Kit's","Luvas desc.(pares)","M\u00e1scara desc.","Manta aluminizada","P\u00e1s do dea","Sonda de aspira\u00e7\u00e3o","Soro fisiol\u00f3gico","Talas pap.","outro","Base do estabiliza.","Colar","Coxins estabiliza.","KED","Maca rigida","T.T.F","Tirante aranha","Tirante de cabe\u00e7a","C\u00e2nula","outro"]],[["Observa\u00e7\u00f5es importantes","escreve",1,"Observa\u00e7\u00f5es: "]],[["Anamnese da emerg\u00eancia m\u00e9dica","escreve",18,"O que aconteceu (sinais e sintomas)","$sim","$nao","A quanto tempo isso aconteceu?","$sim","$nao","Quais?","$sim","$nao","Hor\u00e1rio da \u00faltima medica\u00e7\u00e3o","Quais?","Al\u00e9rgico a alguma coisa?","$sim","$nao","Se sim, especifique:","$sim","$nao","que horas"],["Anamnese gestacional","escreve",24,"Per\u00edodo da gesta\u00e7\u00e3o","$sim","$nao","Nome do m\u00e9dico","$sim","$nao","$sim","$nao","Quantos?","Que horas iniciaram as contra\u00e7\u00f5es","Tempo das contra\u00e7\u00f5es","Intervalo","$sim","$nao","$sim","$nao","$sim","$nao","$sim","$nao","$sim","$nao","Hora do nascimento","Nome do beb\u00ea"],["Avalia\u00e7\u00e3o da cinem\u00e1tica","check",14,"Sim","N\u00e3o","Sim","N\u00e3o","Sim","N\u00e3o","Sim","N\u00e3o","Sim","N\u00e3o","Sim","N\u00e3o","Sim","N\u00e3o"],["Divulgar p\/imprensa?","check",2,"Sim","N\u00e3o"]]];