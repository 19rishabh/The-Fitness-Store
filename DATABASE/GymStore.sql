-- Rename the database to GymStore
ALTER DATABASE kapetann RENAME TO GymStore;

-- Table structure for table "transactions"
CREATE TABLE transactions (
  id SERIAL PRIMARY KEY,
  price NUMERIC(10,2) NOT NULL,
  title VARCHAR(100) NOT NULL,
  quantity INTEGER NOT NULL,
  subtotal_amount NUMERIC(10,2) NOT NULL,
  date DATE NOT NULL,
  invoice_number VARCHAR(100) NOT NULL,
  user_id INTEGER NOT NULL
);

-- Table structure for table "products"
CREATE TABLE products (
  id SERIAL PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  category VARCHAR(50) NOT NULL,
  description TEXT,
  price NUMERIC(10,2) NOT NULL
);

-- Insert sample data for gym equipment
INSERT INTO products (name, category, description, price) VALUES
('Adjustable Dumbbells', 'Equipment', 'Set of adjustable dumbbells with various weight settings.', 149.99),
('Weight Bench', 'Equipment', 'Heavy-duty weight bench with adjustable incline and decline positions.', 199.99),
('Jump Rope', 'Equipment', 'High-quality jump rope for cardio and agility training.', 19.99),
('Resistance Bands Set', 'Equipment', 'Set of resistance bands with different resistance levels for full-body workouts.', 29.99),
('Yoga Mat', 'Equipment', 'Non-slip yoga mat for yoga, pilates, and stretching exercises.', 24.99);

-- Insert sample data for apparel
INSERT INTO products (name, category, description, price) VALUES
('Mens Compression Shirt', 'Apparel', 'Compression shirt designed to enhance performance and recovery.', 29.99),
('Womens Leggings', 'Apparel', 'High-waisted leggings with moisture-wicking fabric for comfort during workouts.', 34.99),
('Mens Training Shorts', 'Apparel', 'Breathable training shorts with built-in moisture management.', 24.99),
('Womens Sports Bra', 'Apparel', 'Supportive sports bra with adjustable straps and removable pads.', 19.99),
('Unisex Sweatshirt', 'Apparel', 'Cozy sweatshirt made from soft, stretchy fabric for warmth and comfort.', 39.99);

-- Insert sample data for supplements
INSERT INTO products (name, category, description, price) VALUES
('Whey Protein Powder', 'Supplements', 'Premium whey protein powder with essential amino acids for muscle growth and recovery.', 49.99),
('BCAA Capsules', 'Supplements', 'Branched-chain amino acid capsules to support muscle repair and reduce muscle soreness.', 29.99),
('Creatine Monohydrate', 'Supplements', 'Pure creatine monohydrate powder for improved strength and power output.', 19.99),
('Pre-Workout Energy Drink', 'Supplements', 'Energizing pre-workout drink formulated to enhance focus, endurance, and performance.', 39.99),
('Omega-3 Fish Oil Softgels', 'Supplements', 'Omega-3 fatty acid supplements for cardiovascular health and joint support.', 14.99);
