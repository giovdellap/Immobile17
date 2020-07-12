--
-- Dump dei dati per la tabella `agente_immobiliare`
--

INSERT INTO `agente_immobiliare` (`id`, `nome`, `cognome`, `datanascita`, `mail`, `password`, `iscrizione`, `verifica`) VALUES
('AG1', 'Armando', 'Beccalossi', '1993-07-10', 'armandobeccalossi@info.it', '$2y$10$19u9f3TzOaIxnM2Hmw/wQe/KCGikRCzS2aF7kT9mqzSuM3kqtc24.', '2020-07-11', 1),
('AG2', 'Rachele', 'Di Marzio', '1995-03-25', 'racheledimarzio@info.it', '$2y$10$eWHqAPj0LMVZ1SENXDp0FO3NEJePYI9Cddi9geKLr921DwJlP02tK', '2020-07-11', 1),
('AG3', 'Ibrahim', 'El Shemy', '1992-06-23', 'ibra@info.it', '$2y$10$jjIFgAltA0Ri7vhZpu.WB.hxv28u6FXxfbWy8ihVjQ/YxOa/aWjYy', '2020-07-11', 1),
('AG4', 'Michele', 'Di Millo', '1972-08-23', 'micheledimillo@info.it', '$2y$10$i1dtZcj3WNwAi78siONX2unMyOTcFFMu51oN2bkdRJ4sVh79NQ6zC', '2020-07-11', 1),
('AG5', 'Onofrio', 'Del Monte', '1950-11-12', 'onofriodelmonte@info.it', '$2y$10$i.sGOiNnuX0O4JKWHQZPf.gsyMJrgS6VI4RHMRrlUT7WVd36Q.FTO', '2020-07-11', 1),
('AG6', 'Giuseppina', 'Sprecacenere', '1987-12-13', 'giuseppina@info.it', '$2y$10$8qQC5b8C41zQG/1fueBLOePTv3Ctgf2Iy7eAymAfbCjl0M5sSebvm', '2020-07-11', 1);



--
-- Dump dei dati per la tabella `cliente`
--

INSERT INTO `cliente` (`id`, `nome`, `cognome`, `datanascita`, `mail`, `password`, `iscrizione`, `verifica`) VALUES
('CL1', 'Giordano', 'Bruno', '1548-02-17', 'vadoafuoco@hotmail.com', '$2y$10$F1ijomIy6kd7HZmGiIZ6tug16kWA8MTrMIYWhyE9FsLZ6Kxm1GOh6', '2020-07-11', 1),
('CL10', 'Eustachio', 'Popovich', '1932-01-10', 'facciolapopovich@gmail.com', '$2y$10$laDIWRPMaOPcC/qpuxzQnOoTfBaOzw0zR4wMYHdIl0gxJmyFJ94TO', '2020-07-12', 1),
('CL11', 'Maria Giovanna', 'Dell\'Arciprete', '1992-06-23', 'maryjo@gmail.com', '$2y$10$Ph3Y.98PMucyq4vEApKzluSDU59XmvEqUcVeemsiixlIFsIVXwDda', '2020-07-12', 1),
('CL12', 'Rajesh', 'Koothrappali', '1968-02-20', 'raji@gmail.com', '$2y$10$L0VCyw5FMYnBoBzH/9rROeL4j8VxiOxnBcH5mzvBhnsvoELgl8OVG', '2020-07-12', 1),
('CL13', 'Armando', 'Belfiglio', '1988-12-23', 'armandoilfucile@gmail.com', '$2y$10$wSxiiDcj56NxMsadMhI3EOFjTel4ZvAmZbMI3OdOGQczKoEipgcpC', '2020-07-12', 1),
('CL14', 'Bob', 'Wallenford II', '1978-03-05', 'sonobob@hotmail.com', '$2y$10$JXWKp/3GGjmnWOAAsKay5OUBCIw4jpz9aBDRHyUEdB9CdffL40ekG', '2020-07-12', 1),
('CL15', 'Adelina', 'Castracani', '1987-06-23', 'adele@libero.it', '$2y$10$RfCHkvpPIjJfDZ4IUbh7HuwRidYdiy8ssMkv41hhGfQuiiXZXYj8G', '2020-07-12', 1),
('CL16', 'Kim', 'Kardashian', '1983-06-23', 'kim@gmail.com', '$2y$10$DVv5JK06tUDWCRI8t99Gm.aeLz2x/6kHS3Cc8r6Q2geH4Nf5Ejraa', '2020-07-12', 1),
('CL17', 'Natasha', 'Colasante', '1982-06-30', 'natascia@gmail.com', '$2y$10$.zAIK3z4pi7.vwb6rNVy8uumOXOsgpK.miFEsZdHN6E.8a6p6VVhO', '2020-07-12', 1),
('CL18', 'Gianfranco', 'Sansonetti', '1987-03-13', 'gianfry@gmail.com', '$2y$10$IcUuBQWvkNiroIgp1zo8GuaycgIHHtopPWuF4KTUQSXmiHURD0joC', '2020-07-12', 1),
('CL19', 'Geremia', 'Di Pietrantonio', '1993-03-23', 'geremia@gmail.com', '$2y$10$qLLGloaYx7g0Bv4hrlsJFu3OnWTq/TiElAhfwEztvQk2ZwLMAV80K', '2020-07-12', 1),
('CL2', 'Giovanni', 'Della Pelle', '1997-01-10', 'giovdellap@gmail.com', '$2y$10$AXF2jsDKZzoDZDK.Hd22MegFBCd/9AYik1YUvQQqrD2sFv2aR.e/C', '2020-07-11', 1),
('CL20', 'Albano', 'Carrisi', '1943-05-20', 'albano@gmail.com', '$2y$10$INAsBB8GP6R7e4v11eRCF.NrdnDs8Oxw0URNue6D7SotA8JvsE93q', '2020-07-12', 1),
('CL21', 'Romina', 'Power', '1951-11-02', 'romina@gmail.com', '$2y$10$TcuelaqqArDL4BqGL/dP2.qN3Ner6AHMyRBTrRqDD7dMaNdrdjp3e', '2020-07-12', 1),
('CL22', 'Orietta', 'Berti', '1943-06-01', 'orietta@gmail.com', '$2y$10$YAhZK/CK4wmpPADVq9439udMvNteZu38uhgVdhg..MsJhVPvocezG', '2020-07-12', 1),
('CL23', 'Dodi', 'Battaglia', '1951-06-01', 'dodicaster@gmail.com', '$2y$10$ARWUziQBzMB755aSikLWJ.eZ5bbyisT4lE3buFx.sQ36oRsDJI/rS', '2020-07-12', 1),
('CL24', 'Riccardo', 'Fogli', '1947-10-21', 'riccardofogli@gmail.com', '$2y$10$4uaH4e8qW6dvMEZkMgHbJeKqCtr0Jst8I6R2OHRjNtfc2g5SailHO', '2020-07-12', 1),
('CL25', 'Enzo', 'Ghinazzi', '1955-09-11', 'pupo@gmail.com', '$2y$10$GKU4jjlanowb2pWnDRCgAuSooSukeLgid4TOKVy6zDowRUOi1qo2q', '2020-07-12', 1),
('CL26', 'Marcella', 'Bella', '1952-06-18', 'montagneverdi@gmail.com', '$2y$10$sFo.jZrTvGR5L8GpYINWs.GYa.sbAIKBAP5FXP2.D4/xxztTioBje', '2020-07-12', 1),
('CL3', 'Marco', 'Di Domenica', '1998-07-07', 'didomenicamarco@hotmail.com', '$2y$10$KEi6eRX5Uj/eKy7PBAbF9.GRrIGcHZbqnSXG4lYJM9MK46dOjd9Uq', '2020-07-11', 1),
('CL4', 'Gabriele', 'Foderà', '1998-08-19', 'marevolk3@gmail.com', '$2y$10$Xc0.GbJHt4xEABs883aAgODWzIYfzj7ZZ2IDokjGAbnjoydYc6KH2', '2020-07-12', 1),
('CL5', 'Lucrezia', 'Marchegiani', '1988-01-20', 'lucr@gmail.com', '$2y$10$Oc8DhsGUtctyp3QmRIiZPekMTNx893bNMxgmRrb2bhKLrd9IpIqmq', '2020-07-12', 1),
('CL6', 'Ousmane', 'Dembelé', '1992-03-20', 'ousmane@gmail.com', '$2y$10$Z9xmFaMSBiQB9nJhZzcz3eZ7Le1.ypOa4YHYufm7Se61oHSwbyAAy', '2020-07-12', 1),
('CL7', 'Bob', 'Hogan', '1973-06-20', 'bobhogan@gmail.com', '$2y$10$o6ESzROF6Ypd9LxF3RnrzeRJ5/X9vdYMXYpLH8EDSe3dsv/LuUHca', '2020-07-12', 1),
('CL8', 'Evaristo', 'Di Gianberardino', '1998-05-30', 'evar123@gmail.com', '$2y$10$TNEKt3uyv3lXjO80x0OZ7.dVMtVTFfze19q448sOPyZs5i0NoiOgG', '2020-07-12', 1),
('CL9', 'Celestino', 'Ricci', '1985-03-10', 'celestinoricci@gmail.com', '$2y$10$lnSOeyBBu31IbGZsDwvUneQle7IaTmvsjew8QpUmsYsSZDr7yJpBa', '2020-07-12', 1);