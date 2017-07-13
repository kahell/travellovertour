SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database:  travellovertour 
--

-- --------------------------------------------------------

--
-- Table structure for table  gallery 
--

CREATE TABLE  gallery  (
   id_gallery  bigint(6) NOT NULL,
   title_gallery  varchar(255) DEFAULT NULL,
   pict_gallery  text
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table  identitas 
--

CREATE TABLE  identitas  (
   id  bigint(5) NOT NULL,
   username  varchar(255) NOT NULL,
   password  varchar(255) NOT NULL,
   email  varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


-- --------------------------------------------------------

--
-- Table structure for table  paket 
--

CREATE TABLE  paket  (
   id_paket  smallint(6) NOT NULL,
   nama_paket  varchar(255) NOT NULL,
   typeTrip_paket  smallint(1) DEFAULT NULL,
   pict_paket  text NOT NULL,
   lokasi_paket  varchar(255) NOT NULL,
   harga_paket  varchar(255) NOT NULL,
   deskripsi_paket  text NOT NULL,
   itenary_paket  text NOT NULL,
   syarat_paket  text NOT NULL,
   pesan_paket  text NOT NULL,
   aktif_paket  varchar(25) NOT NULL,
   slider_paket  smallint(1) NOT NULL,
   popular_paket  smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Table structure for table  post 
--

CREATE TABLE  post  (
   id_post  bigint(6) NOT NULL,
   postedBy_post  varchar(255) NOT NULL,
   title_post  varchar(255) NOT NULL,
   pict_post  text NOT NULL,
   body_post  text NOT NULL,
   date_post  varchar(255) NOT NULL,
   status_post  smallint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table  tags 
--

CREATE TABLE  tags  (
   id_tags  bigint(6) NOT NULL,
   name  varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table  tag_post 
--

CREATE TABLE  tag_post  (
   id_tag_post  bigint(6) NOT NULL,
   id_post  bigint(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table  testimonial 
--

CREATE TABLE  testimonial  (
   id_testi  bigint(6) NOT NULL,
   name_testi  varchar(255) DEFAULT NULL,
   pict_testi  text,
   desc_testi  varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;


--
-- Table structure for table  transaksi 
--

CREATE TABLE  transaksi  (
   id_transaksi  bigint(5) NOT NULL,
   id_paket  smallint(6) NOT NULL,
   nama_pemesan  varchar(255) NOT NULL,
   gender_pemesan  varchar(3) NOT NULL,
   telpon_pemesan  varchar(25) NOT NULL,
   email_pemesan  varchar(255) NOT NULL,
   total_harga  int(255) NOT NULL,
   caraBayar  varchar(25) NOT NULL,
   status_transaksi  tinyint(1) NOT NULL,
   time_transaksi  date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table  trips 
--

CREATE TABLE  trips  (
   id_trips  smallint(1) NOT NULL,
   type_trips  varchar(25) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for table  categories 
--
ALTER TABLE  categories 
  ADD PRIMARY KEY ( id_category );

--
-- Indexes for table  category_post 
--
ALTER TABLE  category_post 
  ADD KEY  id_post  ( id_post ),
  ADD KEY  id_category_post  ( id_category_post );

--
-- Indexes for table  datatamu 
--
ALTER TABLE  datatamu 
  ADD PRIMARY KEY ( id_dataTamu ),
  ADD KEY  id_transaksi  ( id_transaksi );

--
-- Indexes for table  foto 
--
ALTER TABLE  foto 
  ADD PRIMARY KEY ( id_foto ),
  ADD KEY  id_paket  ( id_paket );

--
-- Indexes for table  gallery 
--
ALTER TABLE  gallery 
  ADD PRIMARY KEY ( id_gallery );

--
-- Indexes for table  identitas 
--
ALTER TABLE  identitas 
  ADD PRIMARY KEY ( id );

--
-- Indexes for table  paket 
--
ALTER TABLE  paket 
  ADD PRIMARY KEY ( id_paket ),
  ADD KEY  typeTrip_paket  ( typeTrip_paket );

--
-- Indexes for table  post 
--
ALTER TABLE  post 
  ADD PRIMARY KEY ( id_post );

--
-- Indexes for table  tags 
--
ALTER TABLE  tags 
  ADD PRIMARY KEY ( id_tags );

--
-- Indexes for table  tag_post 
--
ALTER TABLE  tag_post 
  ADD KEY  id_tag_post  ( id_tag_post ),
  ADD KEY  id_post  ( id_post );

--
-- Indexes for table  testimonial 
--
ALTER TABLE  testimonial 
  ADD PRIMARY KEY ( id_testi );

--
-- Indexes for table  transaksi 
--
ALTER TABLE  transaksi 
  ADD PRIMARY KEY ( id_transaksi ),
  ADD KEY  id_paket  ( id_paket );

--
-- Indexes for table  trips 
--
ALTER TABLE  trips 
  ADD PRIMARY KEY ( id_trips ),
  ADD KEY  type_trips  ( type_trips );

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table  categories 
--
ALTER TABLE  categories 
  MODIFY  id_category  bigint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table  datatamu 
--
ALTER TABLE  datatamu 
  MODIFY  id_dataTamu  bigint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table  foto 
--
ALTER TABLE  foto 
  MODIFY  id_foto  bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table  gallery 
--
ALTER TABLE  gallery 
  MODIFY  id_gallery  bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table  identitas 
--
ALTER TABLE  identitas 
  MODIFY  id  bigint(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table  paket 
--
ALTER TABLE  paket 
  MODIFY  id_paket  smallint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table  post 
--
ALTER TABLE  post 
  MODIFY  id_post  bigint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table  tags 
--
ALTER TABLE  tags 
  MODIFY  id_tags  bigint(6) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table  testimonial 
--
ALTER TABLE  testimonial 
  MODIFY  id_testi  bigint(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table  transaksi 
--
ALTER TABLE  transaksi 
  MODIFY  id_transaksi  bigint(5) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table  trips 
--
ALTER TABLE  trips 
  MODIFY  id_trips  smallint(1) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- Constraints for dumped tables
--

--
-- Constraints for table  category_post 
--
ALTER TABLE  category_post 
  ADD CONSTRAINT  category_post_ibfk_1  FOREIGN KEY ( id_post ) REFERENCES  post  ( id_post ) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT  category_post_ibfk_2  FOREIGN KEY ( id_category_post ) REFERENCES  categories  ( id_category ) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table  datatamu 
--
ALTER TABLE  datatamu 
  ADD CONSTRAINT  datatamu_ibfk_1  FOREIGN KEY ( id_transaksi ) REFERENCES  transaksi  ( id_transaksi ) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table  foto 
--
ALTER TABLE  foto 
  ADD CONSTRAINT  foto_ibfk_1  FOREIGN KEY ( id_paket ) REFERENCES  paket  ( id_paket ) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table  paket 
--
ALTER TABLE  paket 
  ADD CONSTRAINT  paket_ibfk_1  FOREIGN KEY ( typeTrip_paket ) REFERENCES  trips  ( id_trips );

--
-- Constraints for table  tag_post 
--
ALTER TABLE  tag_post 
  ADD CONSTRAINT  tag_post_ibfk_1  FOREIGN KEY ( id_tag_post ) REFERENCES  tags  ( id_tags ) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT  tag_post_ibfk_2  FOREIGN KEY ( id_post ) REFERENCES  post  ( id_post ) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table  transaksi 
--
ALTER TABLE  transaksi 
  ADD CONSTRAINT  transaksi_ibfk_1  FOREIGN KEY ( id_paket ) REFERENCES  paket  ( id_paket ) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
